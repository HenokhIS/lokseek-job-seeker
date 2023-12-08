@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card shadow p-4 mb-4">
            <div class="card-header py-3 mb-4 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
    
                <a href="{{ route('admintags.index')}}" class="btn btn-primary">Kembali</a>
            </div>
            <form action="{{ route('admintags.store')}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
                <button class="btn btn-success">Simpan</button>
            </form>
        </div>    
    </div>
@endsection