@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="w-100 h2 font-weight-bold text-center">
        Oracle Via Number
    </div>
    <index-number></index-number>
</div>
            
@endsection
