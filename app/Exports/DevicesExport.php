<?php

namespace App\Exports;

use App\Models\Laptop;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Collection;
use Milon\Barcode\DNS2D;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;


use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DevicesExport implements FromCollection, WithDrawings, WithEvents, ShouldAutoSize, WithStyles, WithProperties, WithBackgroundColor, WithStrictNullComparison, WithChunkReading
{
    public function chunkSize(): int
    {
        return 1000; // Number of rows per chunk
    }

    public function batchSize(): int
    {
        return 1000; // Number of rows per batch
    }

    public function backgroundColor()
    {
        return null;
    }

    public function properties(): array
    {
        return [
            'creator'        => 'Bev Inventory System',
            'lastModifiedBy' => 'BIS',
            'title'          => 'IT Equipments',
            'description'    => 'List of IT Equipments',
            'subject'        => 'IT Equipments',
            'keywords'       => 'it equipments,export,spreadsheet',
            'category'       => 'Equipments',
            'manager'        => 'IT Equipments Application',
            'company'        => 'BEVI',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Title
            1 => [
                'font' => ['bold' => true, 'size' => 15],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'E7FDEC']
                ]
            ],
            // header
            3 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'ddfffd']
                ]
            ],
        ];
    }
    
    public function collection()
    {
        $header = [
            'TAG ID',
            'COMPANY',
            'DEVICE',
            'MODEL',
            'SERIAL NUMBER',
            'SPECIFICATION',
            'ASSIGNED TO',
            'DEPARTMENT',
            'AMOUNT',
            'INCLUSIONS',
            'NOTE',
            'ISSUED DATE',
            'AGE',
            'PREVIOUS OWNER',
            'STATUS',
            'QR CODE',
        ];

        $data = [];

  
        $it_equipments = Laptop::all();

         
      
        foreach($it_equipments as $it_equipment) {

            $data[] = [
                $it_equipment->tag_id,
                $it_equipment->company->name,
                $it_equipment->device->name,
                $it_equipment->model,
                $it_equipment->serial,
                $it_equipment->specification,
                $it_equipment->employee->name,
                $it_equipment->department->name,
                $it_equipment->amount,
                $it_equipment->inclusions,
                $it_equipment->note,
                $it_equipment->issued_date,
                $it_equipment->age,
                $it_equipment->previous_owner,
                $it_equipment->status,
            
            ];
           
        }

        return new Collection([
            ['BEV INVENTORY SYSTEM'],
            [''],
            $header,
            $data
        ]);
    }

     public function drawings()
    {
        $drawings = [];

        foreach (Laptop::all() as $index => $user) {

            $dns = new DNS2D();

            $qrCode = $dns->getBarcodePNG(config('app.url').'/show/detail/'.encrypt($user->id), 'QRCODE', 50, 50);

            $fileName = 'qrcode-' . time() . '.png';
            $filePath = $fileName;
            file_put_contents($filePath, base64_decode($qrCode));

            $drawing = new Drawing();
            $drawing->setName('QR Code');
            $drawing->setDescription('Device QR Code');
            $drawing->setPath($filePath);

            $size = 80;
            $drawing->setHeight($size);

            $drawing->setCoordinates('P' . ($index + 4));

            $drawings[] = $drawing;
        }

        return $drawings;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->getColumnDimension('P')->setWidth(15); // adjust width

                $rowCount = Laptop::count();
                for ($i = 4; $i <= $rowCount + 3; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(60); // match QR size
                }
            },
        ];
    }
}
