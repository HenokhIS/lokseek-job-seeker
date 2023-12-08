@extends('layouts.frontend')

@section('content')
<main>
        <section class="section hero">
            <h1 class="hero__title">Cari pekerjaan impianmu</h1>
        </section>
        <div id="job"></div>
    </main>
@endsection

@push('style-alt')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css')}}" />
@endpush