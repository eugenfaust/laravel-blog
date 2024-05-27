@extends('layouts/base')
@section('content')
<div class="flex w-full h-screen flex-col max-w-[70%]">
    <div class="p-5 border flex flex-col">
        <span>Search by tag: {{$tag->title}}</span>
    </div>
    <div class="p-1 flex flex-col">
        @foreach ($posts as $post)
            @include('templates/post', ['post' => $post])
        @endforeach
        {{ $posts->links() }}
    </div>
</div>
@endsection