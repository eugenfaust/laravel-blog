@extends('templates/main')
@section('content')
    <form action={{ route('posts.create') }} method="post" class="w-full max-w-lg flex flex-col gap-2">
        @csrf
        @method('PUT')
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <div class="flex justify-between gap-2">
            <span>Title</span>
            <input type="text" name="title" id="title" class="border w-full">
        </div>
        <div class="flex flex-col gap-2">
            <span>Content</span>
            @error('content')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <textarea class="border" name="content" id="content"></textarea>
        </div>
        <button type="submit"
            class="self-center border border-green-500 p-1 rounded w-16 hover:bg-green-500 transition-colors">
            Add
        </button>
    </form>
@endsection
