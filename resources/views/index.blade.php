@extends('layout')
@section('content')
    <section class="jumbotron text-center">
        <div class="container py-5">
            <h1 class="jumbotron-heading">Player List</h1>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p class="card-text">Show Scores above the score : </p>
                            <input placeholder="Search Score" class="form-control" id="score" style="width: 150px">
                            <button onclick="search()" class="btn btn-sm btn-outline-secondary my-3">Show</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1 bg-light" id="messages" style="display: none">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" id="success" style="display: none" role="alert">
                            Player successfully updated
                        </div>
                        <div class="alert alert-warning" id="warning" style="display: none" role="alert">
                            Please enter value
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
