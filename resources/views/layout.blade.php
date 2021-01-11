<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Score App</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body class="antialiased">
<header>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Score App</strong>
            </a>
        </div>
    </div>
</header>
<main role="main">
    @yield('content')
</main>
<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="/">Back to Home page</a>
        </p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function search(id){
        var val = $("#score").val();

        $.get( "/score/get/"+val, function( data ) {
            $("#list").show();
            $("#players").html('');
            data.forEach(element => {
                var text = '<div class="col-md-4" id="'+element.Player+'">'+
                    '<div class="card mb-4 box-shadow">'+
                    '<div class="card-body">'+
                    '<p class="card-text">Player Name : '+element.Player+'</p>'+
                    '<p class="card-text">Player Score : '+element.Score+'</p>'+
                    '<input placeholder="New Score" class="form-control" style="width: 150px">'+
                    '<button onclick="update(\''+element.Player+'\')" class="btn btn-sm btn-outline-secondary my-3">Edit Score</button>'+
                    '</div></div></div>';
                $("#players").append(text);
            });
        });
    }
    function update(playerName){
        var newScore = $("#"+playerName).find("input").val();
        if (newScore != ''){
            $.ajax({
                url: "/score/update/"+playerName,
                type: 'PUT',
                data: {
                    'score': newScore,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.success){
                        location.href = "{{ route('index', ['message'=>true]) }}";
                    }
                }
            });
        }else{
            $("#warning").show();
            setInterval(function(){ $("#warning").hide(); }, 3000);
        }
    }
</script>
</body>
</html>
