<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/errors/style.css">

</head>
<body>

@yield('content')
<!-- partial -->

</body>
</html>
