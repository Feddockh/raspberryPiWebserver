<html>
<head>

    <?php $val = 8; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() { 
        $("#start").click(function() {

            // begin php timer function here
            $.post('timer.php', {'status': 'start'}, function(data) {
                $("#status").html(data);
            });

        });

        $("#stop").click(function() {

            $.post('timer.php', {'status': 'stop'}, function(data) {
                $("#status").html(data);
            });

        });

        //runningTime();
        setInterval(runningTime, 1000);

    });

    function runningTime() {
        $.ajax({url: "timer.php", success: function(data) {
            $("#time").html(data);
        }});
    }





    </script>

</head>
<body>
    <h2>Heading</h2>
    <p>Text</p>
    <button id="start">start</button>
    <button id="stop">stop</button>
    <h4>status: </h4>
    <div id="status"></div>
    <h4>time: </h4>
    <div id="time"></div>
    <?php echo $val ?>

</body>
</html>