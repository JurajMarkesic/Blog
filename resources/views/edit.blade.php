@extends('layouts.app')
@section('content')
    <edit-post post="{{ $post }}" categories="{{ $categories }}"></edit-post>
@endsection