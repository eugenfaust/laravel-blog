@extends('layouts/base')
@section('content')
<div class="flex w-full h-screen flex-col max-w-[70%]">
    <div class="p-5 border flex flex-col">
        <span class="text-xl underline">{{ $user->name }} ( {{$user->email }} )</span>
        <span>Registered {{ $user->created_at->diffForHumans() }}</span>
    </div>
    <div class="p-1 flex flex-col">
        <span>User posts</span>
        @foreach ($posts as $post)
            @include('templates/post', ['post' => $post, 'is_author' => true])
        @endforeach
        {{ $posts->links() }}
    </div>
</div>
@endsection