<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Service;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;

 /*   protected function handleRecordCreation(array $data): Model
    {
        $services = $data['service'];
        unset($data['service']);
        $company = Company::create($data);


        $company->service()->attach($services);
    }*/
}
