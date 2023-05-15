<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\Region;
use Filament\Notifications\Notification;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class CitiesController extends Controller
{
    public function exportCities()
    {
        $reader = new Xlsx();
        $city = new City();
        $inputFileName = public_path('cities.xlsx');
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        unset($sheetData[0]);

        foreach ($sheetData as $value) {
            if ($this->isNotNullValues($value)) {
                $area = Area::firstOrNew(
                    [
                        'name' => $value[1]
                    ]
                );

                $area->load('regions');

                $region = Region::firstOrCreate(
                    [
                        'name' => $value[2],
                        'area_id' => $area->id
                    ],
                );

                $city::firstOrCreate(
                    [
                        'name' => $value[0],
                        'region_id' => $region->id,
                        'area_id' => $area->id
                    ],
                );
            }
        }
    }

    private function isNotNullValues(array $data): bool
    {
        return !is_null($data[0]) && !is_null($data[1]) && !is_null($data[2]);
    }
}
