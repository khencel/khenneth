@extends('layouts.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <announcement-component></announcement-component>
@endsection
