<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('username')
                    ->label(__('username'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label(__('phone'))
                    ->required()
                    ->unique(User::class, 'phone')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label(__('email'))
                    ->required()
                    ->unique(User::class, 'email')
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label(__('password'))
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
