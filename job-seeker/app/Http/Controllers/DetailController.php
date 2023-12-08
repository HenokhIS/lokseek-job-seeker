<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class DetailController extends Controller
{
    public function detail(Job $job)
    {
        return view('detail', compact('job'));
    }
}
