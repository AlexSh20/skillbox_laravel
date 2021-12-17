<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/blog/">

    <!-- Bootstrap core CSS
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
</head>

<body>
@include('layout.nav')

<main role="main" class="container">
    <div class="row">
        @yield('content')

        @section('sidebar')
            @include('layout.sidebar')
        @show
    </div><!-- /.row -->

</main><!-- /.container -->


@include('layout.footer')


</body>
</html>
