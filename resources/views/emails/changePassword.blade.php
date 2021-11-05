<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <div>
        <strong>Welcome</strong>{{$data['firstname']}}{{$data['lastname']}}
        <form action="{{ url('newPassword') }}" method="get">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" value="{{$data['email']}}" name="email">
            <button type="submit">Change Password</button>
        </form>
    </div>
</body>
</html>