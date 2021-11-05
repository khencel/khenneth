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
            @php
                $url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            @endphp
            <view-hexagram-yao yao="{{$url}}" id="{{$hex->id}}"></view-hexagram-yao>
        </div>
    </div>
@endsection
