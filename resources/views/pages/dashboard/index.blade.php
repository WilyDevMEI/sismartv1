@extends('layouts.dashboard', ['title' => 'Dashboard', 'state' => 'dashboard', 'page' => 'dashboard'])
@section('content')
    <section id="detail-konsumen">
        <h2>Hi, {{ auth()->user()->name }}</h2>

        <div class="wrapper-form bg-white p-5 rounded-4 mt-5 mb-sm-5 mb-3">
            <img src="{{ asset('image/logo/Dark Logo.png') }}" class="img-fluid" alt="">
        </div>
    </section>
@endsection
