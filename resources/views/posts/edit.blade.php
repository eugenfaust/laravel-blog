@extends('templates/main')
@section('content')
<span class="text-3xl">Post updating</span>
<form action={{ route('posts/update') }} method="post" class="border-2 rounded p-5 w-full max-w-lg flex flex-col gap-2">
    @csrf
    @method('PATCH')
    @error('title')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    <input type="hidden" name="id" value="{{$post->id}}">
    <div class="flex justify-between gap-2">
        <span>Title</span>
        <input type="text" name="title" id="title" value="{{$post->title}}" class="border w-full">
    </div>
    <div class="flex flex-col gap-2">
        <span>Content</span>
        @error('content')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <textarea class="border"  name="content" id="content">{{$post->content}}</textarea>
    </div>
    <div class="flex gap-2">
        <span>Tags</span>
        <input type="text" name="tags" id="tags" class="border w-full" placeholder="cats dogs animals"
        value="{{$post->tags->implode('title', ' ')}}">
    </div>
    <span class="text-sm text-gray-400">Tags should be split using whitespace</span>
    <button type="submit"
        class="mt-2 self-center border border-green-500 p-1 rounded w-16 hover:bg-green-500 transition-colors">
        Update
    </button>
</form>
@endsection