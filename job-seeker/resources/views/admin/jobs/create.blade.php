@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card shadow p-4 mb-4">
            <div class="card-header py-3 mb-4 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
    
                <a href="{{ route('adminjobs.index')}}" class="btn btn-primary">Kembali</a>
            </div>
            <form action="{{ route('adminjobs.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="company_name">Nama Perusahaan</label>
                    <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select class="form-control" name="category_id" id="">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="location_id">Lokasi</label>
                    <select class="form-control" name="location_id" id="">
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tag</label>
                    <select class="form-control multiple-select" name="tags[]" multiple id="">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="banner">Banner</label>
                    <input type="file" name="banner" value="{{ old('banner') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="" cols="30" rows="6" class="form-control">
                        {{ old('detail') }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="requirement">Persyaratan</label>
                    <textarea name="requirement" id="" cols="30" rows="6" class="form-control">
                        {{ old('requirement') }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exp_date">Batas Pendaftaran</label>
                    <input type="date" name="exp_date" value="{{ old('exp_date') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" name="url" value="{{ old('url') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="no_telp">Whatsapp</label>
                    <input type="text" name="no_telp" value="{{ old('no_telp') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="paycheck">Gaji</label>
                    <input type="number" name="paycheck" value="{{ old('paycheck') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="">
                        <option value="0">Draft</option>
                        <option value="1">Active</option>
                    </select>
                </div>
                <button class="btn btn-success">Simpan</button>
            </form>
        </div>    
    </div>
@endsection

@push('style-alt')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script-alt')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.multiple-select').select2();
});
</script>
@endpush