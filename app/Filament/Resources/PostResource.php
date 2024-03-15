<?php

namespace App\Filament\Resources;

use App\Actions\User;
use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Resources';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label(__('User'))
                    ->options(static::getUsers()),
                Forms\Components\TextInput::make('title')
                    ->label(__('title'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->label(__('description'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label(__('phone'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label(__('id'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.username')
                    ->label(__('author'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('title'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('description'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('phone'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('created_at'))
                    ->date('d/m/Y H:i')
                    ->sortable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    /**
     * Get users.
     */
    private static function getUsers(): array
    {
        return User\ListAction::exec(['id', 'username'])
            ->pluck('username', 'id')
            ->toArray();
    }
}
