@extends('layouts.public')

@section('title', 'Daniel Mejta')
@section('page-type', 'homepage')

@section('content')
    @include('components/lead')
    @include('components/header')

    <div id="content" class="content">
        @include('components/developer')
        @include('components/manager')
        @include('components/contact')
        @include('components/map')
    </div>

    @include('components/footer')
@endsection
