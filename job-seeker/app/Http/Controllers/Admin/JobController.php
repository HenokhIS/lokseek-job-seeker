<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use App\Models\Tag;
use App\Http\Requests\Admin\JobRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with(['category','location','tags'])->get();

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get(['name', 'id']);
        $locations = Location::latest()->get(['name', 'id']);
        $tags = Tag::latest()->get(['name', 'id']);

        return view('admin.jobs.create', compact('categories', 'locations', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        if($request->validated()) {
            $banner = $request->file('banner')->store(
                'assets/banner','public'
            );
            $slug = Str::slug($request->company_name, '-');
            $job = Job::create($request->except('banner') + ['banner' => $banner, 'slug' => $slug]);
            $job->tags()->attach($request->tags);
        }

        return redirect()->route('adminjobs.index')->with([
            'message' => 'successfully created!',
            'alert' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $categories = Category::latest()->get(['name', 'id']);
        $locations = Location::latest()->get(['name', 'id']);
        $tags = Tag::latest()->get(['name', 'id']);

        return view('admin.jobs.edit', compact('categories','locations','tags','job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $job)
    {
        if($request->validated()) {
            $slug = Str::slug($request->company_name, '-');
            if($request->banner) {
                File::delete('storage/'.$job->banner);
                $banner = $request->file('banner')->store(
                'assets/banner','public'
            );
                $job->update($request->except('banner') + ['banner' => $banner, 'slug' => $slug]);    
            } else {
                $job->update($request->validated() + ['slug' => $slug]);  
            }
            $job->tags()->sync($request->tags);
        }

        return redirect()->route('adminjobs.index')->with([
            'message' => 'successfully updated!',
            'alert' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        if($job->banner) {
            File::delete('storage/'.$job->banner);
        }

        $job->delete();

        return redirect()->back()->with([
            'message' => 'successfully deleted!',
            'alert' => 'danger'
        ]);
    }
}
