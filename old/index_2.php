<!DOCTYPE html>
<html lang="en">


<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">

    function reload() {
        $("h2").toggle();
        $("#status").load
    }

    $(document).ready(function() { 
        $("#start").click(function() {
            cycle = setInterval(reload, 1000);
        });
        $("#stop").click(function() {
            clearInterval(cycle);
        });
    });

    </script>


</head>


<body>
    <h2>Volvo</h2>
    <button id="start">start</button>
    <button id="stop">stop</button>
    <h4>status: </h4>
    <div id="status"></div>
    <h4>time: </h4>
    <div id="time"></div>

</body>



</html>
