<?php

namespace App\Exports;

use App\Attendence;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ListExport implements FromCollection, WithHeadings
{  /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendence::all();
    }

     public function headings(): array
    {
        return [
        	'S_NO.',
            'Date',
            'Class',
            'Section',
            'Student Name',
            'Status',
        ];
    }
}
