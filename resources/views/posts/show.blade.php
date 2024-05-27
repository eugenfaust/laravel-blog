@extends('templates/main')
@section('content')
    <div class="flex flex-col w-full max-w-[70%] h-full gap-4">
        <span class="text-3xl">{{ $post->title }}</span>
        <span>
            {{ $post->content }}
        </span>
        <span class="mt-4">Author: <a href="{{ route('user', ['user' => $post->user->id]) }}"
                        class="underline">{{ $post->user->name }}</a> * {{ $post->created_at->diffForHumans() }}</span>
    </div>
@endsection
