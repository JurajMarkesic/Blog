@extends('layouts.app')
@section('content')
    <edit-post post="{{ $post }}" tagsselected="{{ $tagsselected }}" categories="{{ $categories }}" tags="{{ $tags }}"></edit-post>
    {{--@foreach($tagsSelected as $tag)--}}
        {{--<p>{{ $tag }}</p>--}}
    {{--@endforeach--}}
@endsection