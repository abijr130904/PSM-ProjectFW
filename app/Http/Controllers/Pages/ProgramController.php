<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 10);

        if ($perPage == 'all') {
            $programs = Program::latest()->get();
        } else {
            $programs = Program::latest()->paginate((int)$perPage)->withQueryString();
        }

        return view('pages.program', compact('programs', 'perPage'));
    }
}
