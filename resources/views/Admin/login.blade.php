<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/admin/css/reset.css">
    <link rel="stylesheet" href="/admin/css/supersized.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script src="/admin/js/supersized.3.2.7.min.js"></script>
    <script src="/admin/js/supersized-init.js"></script>
    <script src="/admin/js/scripts.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="page-container">
        <h1>Login</h1>
        <form action="{{url('admin\doLogin')}}" method="post">
            <input type="text" name="username" class="username" placeholder="Username">
            <input type="password" name="password" class="password" placeholder="Password">
            {{csrf_field()}}
            <button type="submit">Sign me in</button>
            <div class="error"><span>+</span></div>
        </form>
    </div>
</body>
</html>