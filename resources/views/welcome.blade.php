<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Styles -->
        <style>
           body {
                background-image:url("{{asset('/school.jpg')}}");
                background-repeat: no-repeat;
            }
            .login{
                margin-left: 20px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <a class="btn btn-success btn-flat m-b-30 m-t-30 login" href="{{ route('login') }}">Login</a>
    </body>
</html>
