<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Models\Pages\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Organisasi';
    protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\FileUpload::make('photo')
                ->image()
                ->directory('members')
                ->disk('public')
                ->required(),

            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('position')
                ->label('Jabatan')
                ->required()
                ->searchable()
                ->options([

                    // Badan Pengurus Harian
                    'Ketua Umum' => 'Ketua Umum',
                    'Wakil Ketua Umum' => 'Wakil Ketua Umum',
                    'Sekretaris I' => 'Sekretaris I',
                    'Sekretaris II' => 'Sekretaris II',
                    'Bendahara I' => 'Bendahara I',
                    'Bendahara II' => 'Bendahara II',

                    // Divisi Keorganisasian
                    'CO Keorganisasian' => 'CO Keorganisasian',

                    // Divisi Keanggotaan
                    'CO Keanggotaan' => 'CO Keanggotaan',
                    'Anggota Keanggotaan' => 'Anggota Keanggotaan',

                    // Divisi Kepelatihan
                    'CO Kepelatihan' => 'CO Kepelatihan',
                    'Anggota Kepelatihan' => 'Anggota Kepelatihan',

                    // Divisi K3
                    'CO K3' => 'CO K3',
                    'Anggota K3' => 'Anggota K3',

                    // Divisi Komforma
                    'CO Komforma' => 'CO Komforma',
                    'Anggota Komforma' => 'Anggota Komforma',

                    // Divisi Kewirausahaan & Sponsorship
                    'CO Kewirausahaan dan Sponsorship' => 'CO Kewirausahaan dan Sponsorship',
                    'Anggota Kewirausahaan dan Sponsorship' => 'Anggota Kewirausahaan dan Sponsorship',

                    // Divisi KSK
                    'CO KSK' => 'CO KSK',
                    'Anggota KSK' => 'Anggota KSK',

                    // Divisi MIKAPRES
                    'CO MIKAPRES' => 'CO MIKAPRES',

                ])
                ->placeholder('Pilih Jabatan'),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([

            Tables\Columns\ImageColumn::make('photo')
                ->disk('public'),

            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('position')
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->dateTime('d M Y'),

        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
