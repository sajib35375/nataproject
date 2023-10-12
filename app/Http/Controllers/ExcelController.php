<?php

namespace App\Http\Controllers;

use App\Exports\ApplyExport;
use App\Models\Apply;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function exportExcel(Request $request){
        $ids = array_keys($request->all());
        return Excel::download(new ApplyExport($ids), 'Participant.xlsx');
    }
}
