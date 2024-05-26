@extends('templates/main')
@section('content')
    <div class="flex flex-col w-full max-w-lg gap-4">
        <span class="text-2xl">{{ $post->title }}</span>
        <span>
            {{ $post->content }}
        </span>
    </div>
@endsection
