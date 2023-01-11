<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('sweetalert::alert')

    @include('layout.message')
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label>Name</label>
        <input type="text" name="name"  value="{{ old('name') }}"/>
        <br />
        <label>email</label>
        <input type="text" name="email"value="{{ old('email') }}"  />
        <br />
        <label>password</label>
        <input type="password" name="password"  value="{{ old('password') }}"/>
        <br />
        <label>confirm password</label>
        <input type="password" name="password_confirmation"  value="{{ old('password_confirmation') }}"/>
        <br />
        <input type="submit" value="submit" />
    </form>
</body>
</html>
