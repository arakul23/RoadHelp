<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ReferalClient;
use Illuminate\Foundation\Application;
use Illuminate\Http\Client\Request;

class EmployeesController extends Controller
{
    public function handleRefLink(Employee $employee)
    {
        $visitorIp = request()->ip();
        $visitor = ReferalClient::where('visitor',$visitorIp)->first();

        if (!$visitor) {
            ReferalClient::create(['visitor' => $visitorIp]);
            $employee->count_visit++;
            $employee->save();
        }

        return redirect('/');
    }
}
