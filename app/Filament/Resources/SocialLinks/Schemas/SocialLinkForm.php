<?php

namespace App\Filament\Resources\SocialLinks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SocialLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Link Sosial Media')
                    ->schema([
                        Select::make('platform')
                            ->label('Platform')
                            ->required()
                            ->options([
                                'instagram' => 'Instagram',
                                'tiktok' => 'TikTok',
                                'facebook' => 'Facebook',
                                'youtube' => 'YouTube',
                                'twitter' => 'Twitter/X',
                                'whatsapp' => 'WhatsApp',
                                'website' => 'Website',
                            ]),

                        TextInput::make('label')
                            ->label('Label (Opsional)')
                            ->placeholder('@gttrans')
                            ->maxLength(100),

                        TextInput::make('url')
                            ->label('URL')
                            ->required()
                            ->url()
                            ->maxLength(255)
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
