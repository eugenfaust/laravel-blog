<div class="w-full h-12 border-b rounded flex justify-start items-center pl-4 gap-10">
    <a class="text-xl text-green-500 font-bold" href="{{ route('index') }}">Blog</a>
    <a class="text-xl text-green-500 underline" href="{{ route('index') }}">Posts</a>
    <form action="{{ route('posts/search') }}" method="post" class="flex">
        @method("POST")
        @csrf
        <input name="text" type="text" placeholder="Search..." class="border pl-2">
        <button class="border p-1" type="submit">Find</button>
    </form>
</div>
