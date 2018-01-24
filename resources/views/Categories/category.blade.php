@extends('layouts.app')

@section('content')
    <category-posts posts="{{ $posts }}"></category-posts>

@endsection