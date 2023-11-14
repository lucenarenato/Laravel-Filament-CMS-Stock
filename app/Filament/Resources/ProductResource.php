<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('post')->tabs([
                    Tab::make('Content')->schema([
                        Forms\Components\TextInput::make('title')->required()->minLength(2),
                        Forms\Components\TextInput::make('slug')->required()->minLength(2),
                        Forms\Components\RichEditor::make('content')->required(),
                        Forms\Components\DatePicker::make('published_at')->required(),
                        Forms\Components\TextInput::make('price')->numeric(),
                        Forms\Components\TextInput::make('SKU'),
                        Forms\Components\Hidden::make('user_id')
                            ->dehydrateStateUsing(fn ($state) => Auth::id()),
                        Forms\Components\Select::make('categories')
                            ->multiple()
                            ->relationship('categories','title')
                    ]),
                    Tab::make('Meta')->schema([
                        Forms\Components\TextInput::make('meta_description'),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('images')
                            ->image()
                            ->optimize('webp')
                            ->image()
                            ->imageEditor()
                    ]),
                ])
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('images'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('SKU')->searchable(),
                Tables\Columns\TextColumn::make('published_at'),
                Tables\Columns\TextColumn::make('categories.title')->searchable()->badge()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
