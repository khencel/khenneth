@extends('layouts.admin')

@section('header')
    Schedule
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <schedule-consultant></schedule-consultant>
@endsection
