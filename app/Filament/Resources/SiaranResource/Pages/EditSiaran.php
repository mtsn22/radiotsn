<?php

namespace App\Filament\Resources\SiaranResource\Pages;

use App\Filament\Resources\SiaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiaran extends EditRecord
{
    protected static string $resource = SiaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
