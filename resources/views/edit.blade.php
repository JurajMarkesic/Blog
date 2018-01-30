@extends('layouts.app')
@section('content')
    <edit-post :post="{{ $post }}" :tagsselected="{{ $tagsselected }}" :categories="{{ $categories }}" :tags="{{ $tags }}"></edit-post>
@endsection