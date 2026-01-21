<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Ringkasan Booking')
                    ->schema([
                        TextInput::make('booking_code')
                            ->label('Kode')
                            ->disabled(),
                        TextInput::make('service_type')
                            ->label('Layanan')
                            ->disabled(),
                        TextInput::make('status')
                            ->label('Status')
                            ->disabled(),
                        TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->disabled()
                            ->prefix('Rp')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric(),
                    ])->columns(2),

                Section::make('Rute & Arah')
                    ->schema([
                        TextInput::make('fromCity.name')
                            ->label('Dari')
                            ->disabled(),
                        TextInput::make('toCity.name')
                            ->label('Ke')
                            ->disabled(),
                        TextInput::make('trip_type')
                            ->label('Tipe')
                            ->disabled(),
                        DatePicker::make('departure_date')
                            ->label('Berangkat')
                            ->disabled(),
                        DatePicker::make('return_date')
                            ->label('Pulang')
                            ->disabled()
                            ->visible(fn ($get) => $get('trip_type') === 'pp'),
                    ])->columns(3),

                Section::make('Pemesan')
                    ->schema([
                        TextInput::make('customer_name')->label('Nama')->disabled(),
                        TextInput::make('customer_whatsapp')->label('WhatsApp')->disabled(),
                        TextInput::make('passenger_count')
                            ->label('Jumlah Penumpang')
                            ->disabled()
                            ->visible(fn ($get) => $get('service_type') === 'regular'),
                        TextInput::make('vehicle.name')->label('Unit Mobil (Carter)')
                            ->disabled()
                            ->visible(fn ($get) => $get('service_type') === 'charter'),
                    ])->columns(2),

                Section::make('Alamat')
                    ->schema([
                        Textarea::make('pickup_address')->label('Alamat Jemput')->disabled()->rows(3),
                        Textarea::make('destination_address')->label('Alamat Tujuan')->disabled()->rows(3),
                        Textarea::make('baggage')->label('Barang Bawaan')->disabled()->rows(2),
                    ])->columns(2),

                Section::make('Paket Kilat (Jika Ada)')
                    ->schema([
                        TextInput::make('receiver_name')->label('Nama Penerima')->disabled(),
                        TextInput::make('receiver_whatsapp')->label('WA Penerima')->disabled(),
                        TextInput::make('package_type')->label('Jenis Barang')->disabled(),
                        TextInput::make('package_weight_kg')->label('Berat (kg)')->disabled(),
                        TextInput::make('package_length_cm')->label('Panjang')->disabled(),
                        TextInput::make('package_width_cm')->label('Lebar')->disabled(),
                        TextInput::make('package_height_cm')->label('Tinggi')->disabled(),
                        Textarea::make('package_content')->label('Isi Paket')->disabled()->rows(2),
                    ])
                    ->columns(3)
                    ->collapsed()
                    ->visible(fn ($get) => $get('service_type') === 'express'),
            ])->columns(1);
    }
}
