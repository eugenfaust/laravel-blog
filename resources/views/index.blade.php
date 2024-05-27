@extends('layouts/base')
@section('content')
    <div class="flex w-full h-screen">
        <div class="grow mt-2 flex flex-col items-center">
            @forelse ($posts as $post)
                <div class="flex flex-col gap-4 border rounded max-w-[70%] w-full p-2">
                    <span class="text-2xl">{{ $post->title }}</span>
                    <span class="">{{ $post->content }}</span>
                    <span class="mt-4">Author: <a href="{{ route('user', ['user' => $post->user->id]) }}"
                            class="underline">{{ $post->user->name }}</a> * {{ $post->created_at->diffForHumans() }}</span>
                </div>
            @empty
                <span>We have no posts now :(</span>
            @endforelse
            {{ $posts->links() }}
        </div>
        @include('templates/profile')
    </div>
@endsection
