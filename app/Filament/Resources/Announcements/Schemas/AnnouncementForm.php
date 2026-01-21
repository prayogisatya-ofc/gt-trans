<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengumuman')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(150)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label('Isi Pengumuman')
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('is_popup')
                            ->label('Tampilkan sebagai Popup')
                            ->default(true),

                        Toggle::make('show_on_route_detail')
                            ->label('Muncul di Detail Rute')
                            ->default(true),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->columnSpanFull(),
                    ])
                    ->columns(3)
                    ->columnSpan(3),

                Section::make('Jadwal Tampil (Opsional)')
                    ->schema([
                        DateTimePicker::make('start_at')
                            ->label('Mulai Tampil'),

                        DateTimePicker::make('end_at')
                            ->label('Berakhir Tampil'),
                    ])
                    ->columnSpan(2)
                    ->collapsible(),
            ])->columns(5);
    }
}
