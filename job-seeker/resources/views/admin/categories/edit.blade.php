@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card shadow p-4 mb-4">
            <div class="card-header py-3 mb-4 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    
                <a href="{{ route('admincategories.index')}}" class="btn btn-primary">Kembali</a>
            </div>
            <form action="{{ route('admincategories.update', $category->id)}}" method="post">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control">
                </div>
                <button class="btn btn-success">Simpan</button>
            </form>
        </div>    
    </div>
@endsection