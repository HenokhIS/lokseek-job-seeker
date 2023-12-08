@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header mb-4 py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Semua Data</h6>
    
        <a href="{{ route('adminjobs.create')}}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Banner</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Tags</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $job -> company_name }}</td>
                        <td>
                            <a href="{{ Storage::url($job->banner)}}" target="_blank">
                                <img src="{{ Storage::url($job->banner) }}" width="200" alt="">
                            </a>
                        </td>
                        <td>
                            {{$job->category->name}}
                        </td>
                        <td>
                            {{$job->location->name}}
                        </td>
                        <td>
                            @foreach($job->tags as $tag)
                                <span class="alert p-1 m-2 d-block alert-info">
                                    {{$tag->name}}
                                </span>
                            @endforeach
                        </td>
                        <td>
                            {{$job->status === 1 ? 'Active' : 'Draft'}}
                        </td>
                        <td>
                            <a href="{{ route('adminjobs.edit', $job->id)}}" class="btn m-2 btn-info">Edit</a>

                            <form class="d-inline-block" onclick="return confirm('yakin?');" action="{{ route('adminjobs.destroy', $job->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection