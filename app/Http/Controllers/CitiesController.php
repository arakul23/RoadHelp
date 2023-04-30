<?php

namespace App\Http\Controllers;

use App\Models\City;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class CitiesController extends Controller
{
    public function exportCities()
    {
        $reader = new Xlsx();

        $inputFileName = public_path('cities.xlsx');
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        unset($sheetData[0]);

        foreach ($sheetData as $value) {

        }

    }
}
