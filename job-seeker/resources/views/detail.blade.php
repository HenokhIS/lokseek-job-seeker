@extends('layouts.frontend')

@section('content')
<main>
        <section class="section detail container">
            <div class="detail__card">
                <ul class="detail__header">
                    <li>
                        <i class='bx bx-calendar'></i> <span>Exp Date : {{ date('d M Y',strtotime($job->exp_date)) }}</span>
                    </li>
                    <li>
                        <i class='bx bx-money'></i> <span>Rp. {{ $job->paycheck }},- per bulan</span>
                    </li>
                </ul>
                <hr class="hr">

                <h3 class="detail__card-title">Detail Pekerjaan</h3>
                <p class="detail__card-description">{{ $job->detail }}</p>
                <h3 class="detail__card-title">Syarat Pendaftaran</h3>
                <p class="detail__card-description">{{ $job->requirement }}</p>

                      <div class="detail__line">
                      <hr>
                      <h3 class="detail__line-title">Kirim Lamaran</h3>
                    <hr>
                    </div>
                    <div class="detail__apply">
                      <a href="{{ $job->url }}" target="_blank" class="detail__apply-button url"><i class='bx bx-link-external'></i></a>
                      <a href="mailto:{{ $job->email }}" class="detail__apply-button email"><i class='bx bx-envelope' ></i></a>
                      <a href="https://api.whatsapp.com/send/?phone={{ $job->no_telp }}&text=saya ingin..." target="_blank" class="detail__apply-button wa"><i class='bx bxl-whatsapp' ></i></a>
                    </div>
                    <!-- <a href="" class="detail__share">Share <i class='bx bx-share'></i></a> -->
            </div>
        </section>
    </main>
@endsection

@push('style-alt')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/detail.css')}}" />
@endpush