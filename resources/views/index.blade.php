@extends('layouts.app')
@section('content')
    <posts></posts>
    @auth
        <form action="/posts/create">
            <button type="submit" class="btn">New Post</button>
        </form>
    @endauth
@endsection