@extends('layouts/base')
@section('content')
<div class="flex w-full h-screen">
    <div class="grow mt-2 flex flex-col items-center">
        @forelse ($posts as $post)
            @include('templates/post', ['post' => $post])
        @empty
            <span>We have no posts now :(</span>
        @endforelse
        {{ $posts->links() }}
    </div>
    @include('templates/profile')
</div>
@endsection