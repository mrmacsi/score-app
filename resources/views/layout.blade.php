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
    function get(id){
        $("#info").show();
        $("#newScore").hide();
        $.get( "/score/get/"+id, function( data ) {
            $("#playerName").text(data.Player);
            $("#playerScore").text(data.Score);
        });
    }
    function update(){
        var id = $("#playerScore").text();
        var newScore = $("#newPlayerScore").val();
        $.ajax({
            url: "/score/update/"+id,
            type: 'PUT',
            data: {
                'score': newScore,
                "_token": "{{ csrf_token() }}"
            },
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>
</body>
</html>
