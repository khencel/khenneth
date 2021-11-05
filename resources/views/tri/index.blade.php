@extends('layouts.admin')

@section('header')
    Trigram
@endsection

@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <trigram-component></trigram-component>
@endsection
