<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntriesController extends Controller
{
    public function index()
    {
        $entries = Entry::query()
            ->with('detections','detections.sensor','notices')
            ->orderBy('fecha', 'DESC')
            ->paginate(30);

      //  dd($entries);

        return view('entries.index', [
            'entries' => $entries
        ]);
    }

    public function manageEntries()
    {
        return view('entries.manage');
    }
}
