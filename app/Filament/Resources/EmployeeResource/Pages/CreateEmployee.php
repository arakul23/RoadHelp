<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use App\Models\Employee;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function handleRecordCreation(array $data): Employee
    {
        $employee = Employee::create($data);
        $employee->referral_link = config('app.url') . '/ref/' . $employee->id;
        $employee->save();

        return $employee;
    }
}
