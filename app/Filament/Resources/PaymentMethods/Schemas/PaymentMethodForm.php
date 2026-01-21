<?php

namespace App\Filament\Resources\PaymentMethods\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentMethodForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Metode Pembayaran')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(120)
                            ->placeholder('Contoh: Transfer Bank BCA'),

                        Select::make('type')
                            ->label('Tipe')
                            ->required()
                            ->options([
                                'cash' => 'Cash ke Driver',
                                'bank_transfer' => 'Transfer Bank',
                                'qris' => 'QRIS',
                            ])
                            ->reactive(),

                        Textarea::make('description')
                            ->label('Deskripsi (Opsional)')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Contoh: Transfer ke rekening BCA a.n. PT. Contoh Nama'),

                        // BANK FIELDS
                        TextInput::make('bank_name')
                            ->label('Nama Bank')
                            ->visible(fn ($get) => $get('type') === 'bank_transfer')
                            ->maxLength(50)
                            ->placeholder('Contoh: BCA'),

                        TextInput::make('account_name')
                            ->label('Nama Pemilik Rekening')
                            ->visible(fn ($get) => $get('type') === 'bank_transfer')
                            ->maxLength(100)
                            ->placeholder('Contoh: PT. Contoh Nama'),

                        TextInput::make('account_number')
                            ->label('Nomor Rekening')
                            ->visible(fn ($get) => $get('type') === 'bank_transfer')
                            ->maxLength(50)
                            ->placeholder('Contoh: 1234567890'),

                        // QRIS
                        FileUpload::make('qris_image_path')
                            ->label('Gambar QRIS')
                            ->directory('qris')
                            ->image()
                            ->imageEditor()
                            ->visible(fn ($get) => $get('type') === 'qris')
                            ->helperText('Upload QRIS untuk ditampilkan di detail rute.')
                            ->disk('public')
                            ->directory('qris')
                            ->columnSpanFull(),

                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ])->columns(1);
    }
}
