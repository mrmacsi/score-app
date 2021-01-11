@extends('layout')
@section('content')
    <section class="jumbotron text-center">
        <div class="container py-5">
            <h1 class="jumbotron-heading">Player List</h1>
        </div>
    </section>
    @if (isset($message))
        <div class="py-1 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            Player successfully updated
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p class="card-text">Show Scores above number : </p>
                            <input placeholder="Search Score" class="form-control" id="score" style="width: 150px">
                            <button onclick="search()" class="btn btn-sm btn-outline-secondary my-3">Show</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light" id="list">
        <div class="container">
            <div class="row" id="players">
            </div>
        </div>
    </div>
@endsection
