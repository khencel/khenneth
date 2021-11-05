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
    <div class="card">
        <div class="card-body">
            <table id="myTable" class="table table-hover">
                <thead class="thead-dark">
                    <th>Hexagram</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($hexagram as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{url('hexagram/'.$item->id.'/'.'1')}}">
                                    <button class="btn btn-info float-right"><i class="fas fa-eye"></i>View</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
