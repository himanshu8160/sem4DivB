<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Otp </title>
</head>
<body>
    @include('layout.message')
    @include('sweetalert::alert')
    @if(Session::has('id'))
        <div class="alert alert-danger">
        {{ Session::get('id')}}
        </div>
    @endif
    <form method="post" >
        Enter Otp
        <input type="number" name="otp" required /><br />
        <input type="submit" value="submit" />
    </form>
</body>
</html>
