<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Relic;

class RelicController extends Controller
{
    public function index()
    {
        $relics = Relic::all();
        return view('relics.index', compact('relics'));
    }
}
