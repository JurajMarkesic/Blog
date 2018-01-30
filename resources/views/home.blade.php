@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-12 col-md-12 col-lg-10 offset-lg-2">
            <div class="card bg-success text-white">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    <categories></categories>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Tags</div>

                <div class="card-body">
                    <tags></tags>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
