@extends('layouts.admin')
@section('header')
    System Setting
@endsection
@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <about-us></about-us>
@endsection
