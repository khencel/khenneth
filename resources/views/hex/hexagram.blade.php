@extends('layouts.admin')

@section('header')
    Hexagram
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div>
       <view-hexagram-component></view-hexagram-component>
    </div>
@endsection
