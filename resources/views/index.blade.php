@extends('layouts.app')
@section('content')
    <posts></posts>
    <form action="/posts/create">
        <button type="submit" class="btn">New Post</button>
    </form>
@endsection