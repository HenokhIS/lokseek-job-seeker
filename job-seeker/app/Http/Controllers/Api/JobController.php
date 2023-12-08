<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with(['category','location','tags'])->where('status', true)->get();

        return response()->json([
            'jobs' => $jobs,
            'status' => 200
        ]);
    }

    public function getJobByLocation(Location $location)
    {
        $jobs = Job::with(['category','location','tags'])
            ->where(['status' => true, 'location_id' => $location->id])->get();
        
        return response()->json([
            'jobs' => $jobs,
            'status' => 200
        ]);
    }

    public function search(Request $request) 
    {
        $jobs = Job::with(['category','location','tags'])
        ->where([
            'status' => true, 
            'location_id' => $request->locationId, 
            'category_id' => $request->categoryId
            ])
        ->get();

        return response()->json([
            'jobs' => $jobs,
            'status' => 200
        ]);
    }
}
