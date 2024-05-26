<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Blog</title>
</head>
<body>
  @include('templates/navbar')
  <div class="flex flex-col w-full justify-center items-center h-screen">
    @yield('content')
  </div>
</body>
</html>