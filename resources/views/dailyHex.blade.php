@extends('layouts.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <table class="table table-hover">
            <thead>
                <th>Date</th>
                <th>Hexagram</th>
            </thead>
            <tbody>
                @foreach ($hexHistory as $item)
                <tr>
                    <td>{{$item->date}}</td>
                    <td>{{$item->hexagram->name}}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection
