@extends('layout')
@section('content')
    <section class="jumbotron text-center">
        <div class="container py-5">
            <h1 class="jumbotron-heading">Player List</h1>
        </div>
    </section>
    @if (isset($message))
        <div class="alert alert-success" role="alert" style="display: none">
            Player successfully updated
        </div>
    @endif
    <div class="album py-5 bg-light" id="info" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p class="card-text">Player Name : <span id="playerName"></span></p>
                            <p class="card-text">Player Score : <span id="playerScore"></span></p>
                            <input placeholder="New Score" class="form-control" id="newPlayerScore" style="width: 150px">
                            <button onclick="update()" class="btn btn-sm btn-outline-secondary my-3">Edit Score</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($list as $item)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <p class="card-text">{{$item['Player']}}</p>
                                <button onclick="get({{$item['Score']}})" class="btn btn-sm btn-outline-secondary">Show</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
