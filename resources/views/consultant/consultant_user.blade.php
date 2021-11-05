@extends('layouts.admin')

@section('header')
    {{$user->firstname}} {{$user->lastname}}
@endsection


@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <consultant-journal user_id="{{$user->id}}{{$schedule->id}}"></consultant-journal>
@endsection
