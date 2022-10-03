<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TemplateQuestionExport implements WithHeadings, ShouldAutoSize, WithStyles, WithEvents
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'No.',
            "Loại câu hỏi",
            'Nội dung',
            'Đáp án chính xác(Có nhiều đáp án đúng => các đáp án cách nhau bởi dấu phẩy)',
            "Đáp án A",
            "Đáp án B",
            "Đáp án C",
            "Đáp án D",
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                // set background C1 -> E1
                $event->sheet->getStyle('B1:C1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ffffff00');
            },
        ];
    }
}
