<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Hash;
use UnitEnum;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;
    protected static ?string $navigationLabel = 'Pengaturan';
    protected static ?string $title = 'Pengaturan';
    protected static string|UnitEnum|null $navigationGroup = 'CMS';
    protected static ?int $navigationSort = 4;
    
    protected string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'admin_whatsapp' => SiteSetting::getByKey('admin_whatsapp'),
            'route_important_note' => SiteSetting::getByKey('route_important_note'),
            'route_booking_guide' => SiteSetting::getByKey('route_booking_guide'),
            'route_cancellation_policy' => SiteSetting::getByKey('route_cancellation_policy'),
            'driver_scan_pin' => null,
            'driver_scan_pin_confirmation' => null,
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('Kontak Admin')
                    ->schema([
                        TextInput::make('admin_whatsapp')
                            ->label('Nomor WhatsApp Admin')
                            ->helperText('Gunakan format internasional. Contoh: 6281234567890')
                            ->required()
                            ->maxLength(20),
                    ]),

                Section::make('Konten Wajib Baca')
                    ->description('Konten ini akan muncul di semua halaman detail rute.')
                    ->schema([
                        RichEditor::make('route_important_note')
                            ->label('Catatan Penting')
                            ->columnSpanFull(),

                        RichEditor::make('route_booking_guide')
                            ->label('Cara Pemesanan')
                            ->columnSpanFull(),

                        RichEditor::make('route_cancellation_policy')
                            ->label('Ketentuan Pembatalan / Perubahan Jadwal')
                            ->columnSpanFull(),
                    ]),

                Section::make('Keamanan Scan Driver')
                    ->description('PIN ini digunakan driver untuk membuka halaman scan tiket.')
                    ->schema([
                        TextInput::make('driver_scan_pin')
                            ->label('PIN Scan Driver (6 digit angka)')
                            ->password()
                            ->revealable()
                            ->helperText('Masukkan 6 digit angka. Kosongkan jika tidak ingin mengubah PIN.')
                            ->minLength(6)
                            ->maxLength(6)
                            ->regex('/^\d{6}$/')
                            ->same('driver_scan_pin_confirmation'),

                        TextInput::make('driver_scan_pin_confirmation')
                            ->label('Konfirmasi PIN')
                            ->password()
                            ->revealable()
                            ->minLength(6)
                            ->maxLength(6)
                            ->regex('/^\d{6}$/'),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $state = $this->form->getState();

        $this->setSetting('admin_whatsapp', $state['admin_whatsapp'] ?? null);

        $this->setSetting('route_important_note', $state['route_important_note'] ?? null);
        $this->setSetting('route_booking_guide', $state['route_booking_guide'] ?? null);
        $this->setSetting('route_cancellation_policy', $state['route_cancellation_policy'] ?? null);

        if (!empty($state['driver_scan_pin'])) {
            $this->setSetting(
                'driver_scan_pin_hash',
                Hash::make($state['driver_scan_pin']),
                'password',
                'security',
                false,
            );
        }

        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }

    private function setSetting(string $key, $value, string $type = 'text', string $group = 'general', bool $isPublic = true): void
    {
        SiteSetting::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
                'is_public' => $isPublic,
            ]
        );
    }

    protected function getForms(): array
    {
        return [
            'form',
        ];
    }
}
