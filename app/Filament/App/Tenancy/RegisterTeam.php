<?php

namespace App\Filament\App\Tenancy;

use App\Models\Team;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register team';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('slug'),
            ]);
    }

    protected function handleRegistration(array $data): Team
    {
        if (Team::where('slug', $data['slug'])->exists()) {
             Notification::make()
                ->danger()
                ->title(__('Registration failed'))
                ->body(__('This team slug has already been taken.'))
                ->send();
            
            throw ValidationException::withMessages([
                'slug' => __('This team slug has already been taken.'),
            ]);
        }
        $team = Team::create($data);

        $team->members()->attach(Auth::user());

        return $team;
    }
}