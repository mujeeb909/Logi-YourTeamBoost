<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\CoachDataExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export($coachId)
    {   
        $coach = User::where('id', $coachId)->first();
        
        $fileName = $coach->name . '.xlsx';

        return Excel::download(new CoachDataExport($coachId), $fileName);
    }
}
