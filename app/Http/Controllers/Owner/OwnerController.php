<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Dorm;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $dorms = Dorm::all();
        return view('owner.dashboard', compact('dorms'));
    }
}