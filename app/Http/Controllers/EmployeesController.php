<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Foundation\Application;

class EmployeesController extends Controller
{
    public function handleRefLink(Employee $employee): Application
    {
        $employee->count_visit++;
        $employee->save();

        return redirect('/');
    }
}
