@extends("layouts/base")
@section("content")
    <div class="flex w-full h-screen">
      <div class="grow">
        @yield('content')
      </div>
      @include('templates/profile')
    </div>
@endsection