<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KuisionerResource\Pages;
use App\Filament\Resources\KuisionerResource\RelationManagers;
use App\Models\Kategori;
use App\Models\Kuisioner;
use App\Models\Survey;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;

class KuisionerResource extends Resource
{
    protected static ?string $model = Kuisioner::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Survei';
    protected static ?string $navigationLabel = 'Kuisioner';
    protected static ?int $navigationSort = 2;
    protected static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }
    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('survey_id')->label('Surveys')
                    ->options(Survey::all()->pluck('nama', 'id'))->required()->default(1),
                Select::make('kategori_id')->required()
                    ->options(Kategori::all()->pluck('nama', 'id'))->required()->default(1),
                Textarea::make('pertanyaan')->required(),
                Toggle::make('level')->label('Sub Pertanyaan?')->inline(false)->reactive(),
                Select::make('syarat')->label('Dari Pertanyaan:')->options(Kuisioner::all()->pluck('pertanyaan', 'id'))
                    ->hidden(fn(Closure $get) => $get('level') !== true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('survey.nama')->label('Survei'),
                TextColumn::make('pertanyaan')->searchable(),
                TextColumn::make('kategori.nama')->searchable(),
                TextColumn::make('level'),
                TextColumn::make('syarat'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\JawabansRelationManager::class,
        ];
    }

    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $query->whereIn('id', Kuisioner::search($searchQuery)->keys());

        }

        // return $query;
        return $query->filter(['search' => $searchQuery]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKuisioners::route('/'),
            'create' => Pages\CreateKuisioner::route('/create'),
            'view' => Pages\ViewKuisioner::route('/{record}'),
            'edit' => Pages\EditKuisioner::route('/{record}/edit'),
        ];
    }
}
