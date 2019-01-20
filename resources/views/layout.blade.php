
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <a href="{{ route('article.index') }}">
                    <img src="https://avatars1.githubusercontent.com/u/10170571?s=460&v=4" class="img-thumbnail rounded-circle" style="height: 200px" alt="Nic Davies Profile Image">
                    <h1>Nic Davies</h1>
                </a>
            </div>
        </div>

        @yield('content')
    </div>
</body>
</html>