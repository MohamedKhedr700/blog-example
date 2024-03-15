<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Models\Admin;
use Filament\Forms;
use App\Filament\Resources\PostResource;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\Rules\Password;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
}