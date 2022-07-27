<?php

namespace App\Filament\Resources\BranchResource\Pages;

use App\Filament\Resources\BranchResource;
use Filament\Resources\Pages\Page;

class SortBranch extends Page
{
    protected static string $resource = BranchResource::class;

    protected static string $view = 'filament.resources.branch-resource.pages.sort-branch';
}
