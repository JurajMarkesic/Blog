@extends('layouts.app')
@section('content')
   <div>
       <post post="{{ $post }}"></post>
        @auth
            <form action="/posts/{{$post->id}}/edit" >
                <button class="btn" type="submit">Edit</button>
            </form>
        @endauth
   </div>
@endsection