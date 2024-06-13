<?php

namespace App\Http\Controllers\Owner;

use App\Models\Dorm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DdormController extends Controller
{
    public function show($id)
    {
        $dorm = Dorm::findOrFail($id);
        return view('owner.dorm.show', compact('dorm'));
    }
}