<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>
<body>
    @include('layout.message')
    @include('sweetalert::alert')
    <form method="post" >
        Enter Email
        <input type="email" name="email" required /><br />
        <input type="submit" value="submit" />
    </form>
</body>
</html>
