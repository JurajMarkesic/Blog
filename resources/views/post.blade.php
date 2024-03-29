@extends('layouts.app')
@section('content')
   <div>
       <post :post="{{ $post }}"></post>
        @auth
            <form action="/posts/{{$post->id}}/edit">
                <button class="btn btn-outline-primary" type="submit">Edit</button>
            </form>
        @endauth
       <comments :post="{{ $post  }}" class="mt-5"></comments>
   </div>
@endsection