@extends('layouts.app')
@section('content')
    <posts posts="{{ json_encode($posts) }}"></posts>
@endsection