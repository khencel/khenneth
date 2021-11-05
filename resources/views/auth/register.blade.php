@extends('layouts.master')

@section('content')

    <div class="row justify-content-center mb-4" style="background-image: url({{ asset('img/bg-min.png') }});background-position:center;background-size:cover;">
        <div class="col-md-8 text-dark rounded pt-5 pb-5 ml-3 mr-3 mt-5 mb-5">
            <div class="text-center mb-5">
                <h4>Register</h4>
            </div>
            <hr>
            <registration-user></registration-user>  
        </div>
    </div>

@endsection
