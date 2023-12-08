@extends('layouts.frontend')

@section('content')
<main>
        <section class="section loker container">
            @if(session()->has('message'))
                <div class="loker__card" style="background: lightgreen;color: #fff;margin-bottom:1rem">
                    {{session()->get('message')}}
                </div>
            @endif
            @if($errors->any())
                <div class="loker__card" style="background: salmon;color: #fff;margin-bottom:1rem">
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="loker__card">
                <form action="{{ route('job.store') }}" method="post" class="loker__form" enctype="multipart/form-data">
                    @csrf
                    <div class="loker__group">
                        <label for="posisi" class="loker__label">Nama Perusahaan *</label>
                        <input type="text" name="company_name" value="{{old('company_name')}}" placeholder="" class="loker__input">
                    </div>
                    <div class="loker__group">
                        <label for="posisi" class="loker__label">Posisi yang ditawarkan *</label>
                        <select class="loker__input" name="category_id" id="">
                          <option value="">== pilih ==</option>
                          @foreach($categories as $category)
                            <option {{old('category_id') ? 'selected' : null}} value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="loker__group">
                        <label for="posisi" class="loker__label">Lokasi Penempatan Karyawan *</label>
                        <select class="loker__input" name="location_id" id="">
                           <option value="">== pilih ==</option>
                           @foreach($locations as $location)
                            <option {{old('location_id') ? 'selected' : null}} value="{{$location->id}}">{{$location->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="loker__group">
                      <label for="posisi" class="loker__label">Tags *</label>
                      <select class="loker__input" multiple name="tags[]" id="">
                         <option value="">== pilih ==</option>
                         @foreach($tags as $tag)
                            <option {{old('tags[]') ? 'selected' : null}} value="{{$tag->id}}">{{$tag->name}}</option>
                          @endforeach
                        </select>
                  </div>
                    <div class="loker__group">
                        <label for="posisi" class="loker__label">Banner *</label>
                        <label for="banner" class="loker__banner"><i class='bx bx-upload'></i></label>
                        <input type="file" name="banner" value="{{old('banner')}}" style="display: none;" id="banner" placeholder="Contoh: Mataram, Lombok Barat" class="loker__input">
                    </div>
                    <div class="loker__group">
                        <label for="posisi" class="loker__label">Detail Pekerjaan *</label>
                        <textarea rows="8" name="detail" class="loker__input loker__textarea">{{ old('detail') }}</textarea>
                    </div>
                    <div class="loker__group">
                        <label for="posisi" class="loker__label">Syarat Pendaftaran *</label>
                        <textarea rows="8" name="requirement" class="loker__input loker__textarea">{{ old('requirement') }}</textarea>
                    </div>
                    <div class="loker__group">
                        <label for="posisi" class="loker__label">Tanggal Akhir Pendaftaran *</label>
                        <input type="date" name="exp_date" value="{{ old('exp_date') }}" class="loker__input">
                    </div>
                    <div class="loker__group">
                        <label for="paycheck" class="loker__label">Gaji</label>
                        <input type="number" name="paycheck" value="{{ old('paycheck') }}" placeholder="" class="loker__input">
                    </div>
                    <div class="loker__group">
                        <label for="posisi" class="loker__label">Link Pendaftaran *</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Isikan alamat email anda" class="loker__input loker__link">
                        <input type="text" name="no_telp" value="{{ old('no_telp') }}" placeholder="Isikan nomer whatsapp anda" class="loker__input loker__link">
                        <input type="text" name="url" value="{{ old('url') }}" placeholder="https://" class="loker__input loker__link">
                    </div>

                    <button type="submit" class="loker__button">Terbitkan</button>
                </form>
            </div>
        </section>
    </main>
@endsection

@push('style-alt')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/loker.css')}}" />
@endpush