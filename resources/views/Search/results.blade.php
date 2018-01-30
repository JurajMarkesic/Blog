@extends('layouts.app')
@section('content')
    <search-results :posts="{{ $posts }}"></search-results>
@endsection