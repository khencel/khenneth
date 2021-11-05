@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$consultant->firstname}} {{$consultant->lastname}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border p-5 shadow">
                                <img src="{{ asset('img/avatarMale.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td class="font-weight-bold">Country:</td><td>{{$consultant->country}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Email Address:</td><td>{{$consultant->email}}</td>
                                </tr>
                            </table>
                            <consultant-user id="{{$consultant->id}}"></consultant-user>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
