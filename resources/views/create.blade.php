@extends('layouts.app')
@section('content')
    <create-post categories="{{ $categories }}" tags="{{ $tags }}"></create-post>


@endsection