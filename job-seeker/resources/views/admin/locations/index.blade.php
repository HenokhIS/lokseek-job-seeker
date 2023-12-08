@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header mb-4 py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Semua Data</h6>
    
        <a href="{{ route('adminlocations.create')}}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $location)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $location -> name }}</td>
                        <td class="d-flex" style="column-gap: .5rem;flex-wrap: wrap">
                            <a href="{{ route('adminlocations.edit', $location->id)}}" class="btn btn-info">Edit</a>

                            <form onclick="return confirm('yakin?');" action="{{ route('adminlocations.destroy', $location->id)}}" method="post">
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