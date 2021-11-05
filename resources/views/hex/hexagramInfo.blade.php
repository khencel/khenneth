@extends('layouts.admin')

@section('header')
    {{$hex->name}}
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="card">
        <div class="card-body">
            @include('partial.hex-nav')
            <view-hexagram-info id="{{$hex->id}}"></view-hexagram-info>
        </div>
    </div>
@endsection
