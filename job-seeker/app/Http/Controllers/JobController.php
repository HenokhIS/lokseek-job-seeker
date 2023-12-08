<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;
use App\Models\Tag;
use App\Models\Job;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function create()
    {
        $categories = Category::latest()->get(['name', 'id']);
        $locations = Location::latest()->get(['name', 'id']);
        $tags = Tag::latest()->get(['name', 'id']);

        return view('create-loker', compact('categories', 'locations', 'tags'));
    }

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

        return redirect()->back()->with([
            'message' => 'lowongan kerja anda berhasil di upload, tunggulah sehingga admin menyetujuinya agar dapat ditampilkan di halaman homepage',
            'alert' => 'success'
        ]);
    }
}
