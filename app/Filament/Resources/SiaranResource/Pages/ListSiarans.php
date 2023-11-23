<?php

namespace App\Filament\Resources\SiaranResource\Pages;

use App\Filament\Resources\SiaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiarans extends ListRecords
{
    protected static string $resource = SiaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
