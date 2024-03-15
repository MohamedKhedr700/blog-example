<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Admin;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label(__('phone'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label(__('password'))
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
