@extends('layouts.app')
@section('content')
    @auth
        <form action="/posts/create" class="mb-5">
            <button type="submit" class="btn btn-primary">New Post</button>
        </form>
    @endauth
    <posts></posts>
@endsection