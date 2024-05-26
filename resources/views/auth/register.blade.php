@extends('layouts/base')
@section('content')
    <form action="{{ route('register') }}" method="post" class="flex flex-col gap-2 items-center w-full max-w-lg">
        @csrf
        <span class="text-xl">Register form</span>
        <input type="text" name="name" placeholder="Your name">
        @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        <input type="text" name="email" placeholder="Your e-mail">
        @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        <input type="password" name="password" placeholder="Password">
        @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        <input type="password" name="password_confirmation" placeholder="Password Confirmation">
        @error('password_confirmed')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        <button type="submit" class="p-1 h-8 bg-green-500 border">Register</button>
    </form>
@endsection
