<div class="flex flex-col gap-4 border rounded max-w-[70%] w-full p-2">
    @isset($is_author)
    <div class="flex justify-between w-full">
    <span class="text-2xl">{{ $post->title }}</span>
    <div class="flex gap-1">
    <a href="{{ route("posts/edit", ['post' => $post->id])}}" class="p-1 bg-blue-500 rounded text-white">Edit</a>
    <a href="{{ route("posts/delete", ['post' => $post->id])}}" class="p-1 bg-red-500 rounded text-white">Delete</a>
    </div>
    </div>
    @else
    <span class="text-2xl">{{ $post->title }}</span>
    @endisset
    <span>{{ strlen($post->content) > 1000 ? substr($post->content, 0, 1000) . '...' : $post->content }}</span>
    @if (strlen($post->content) > 1000)
        <a class="underline text-blue-500" href="{{ route('posts/show', ['post' => $post->id]) }}">Show full</a>
    @endif
    @if (count($post->tags) > 0)
        <div class="flex gap-2 mt-2">
            <span>Tags: </span>
            @foreach ($post->tags as $tag)
                <a href="{{ route('tag/search', ['tag' => $tag->id]) }}"
                    class="border-2 rounded pl-1 pr-1 bg-gray-300">{{$tag->title}}</a>
            @endforeach
        </div>
    @endif
    <span class="">Author: <a href="{{ route('user', ['user' => $post->user->id]) }}"
            class="underline">{{ $post->user->name }}</a> * {{ $post->created_at->diffForHumans() }}</span>
</div>