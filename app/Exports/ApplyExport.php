<?php

namespace App\Exports;

use App\Models\Apply;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplyExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */


    protected $ids;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function collection()
    {
        return Apply::with('course','session','user')->where('session_id',$this->ids)->get();
    }

    public function map($student): array
    {
        return [
            $student->name_en,
            $student->course->course_name,
            $student->email,
            $student->gender,
            $student->organization_name,
            $student->head_of_organization,
            $student->date_of_birth,
            $student->mobile,
            $student->controlling_officer,
            $student->working_station
        ];
    }

    // this is fine
    public function headings(): array
    {
        return [
            'Name',
            'Course',
            'Email',
            'Gender',
            'Organization',
            'Head of Organization',
            'Date of Birth',
            'Phone',
            'Controlling Officer',
            'Working Station'
        ];
    }
}
