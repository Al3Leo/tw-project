<!DOCTYPE html>
<html lang="en">
<head>
    <title>Error</title>
    <?php require_once "../../components/utils/headMetadata.html"?>
    <base href="/" />  <!-- Torna in /src -->
    <style>
        @import "tw-project/src/assets/css/Global.css";
        body {
            background-image: url("tw-project/src/assets/images/404.jpg");            
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }

        div {
            padding: 30px;
        }

        audio {
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div>
        <h1>Oh no, ERROR 404!</h1>
        <h2>Maybe a black hole ate all our beautiful pages...</h2>
        <p>
            Don't worry, we'll fix it! Meanwhile here is a waiting song.
        </p>
        <audio controls>
            <source src="tw-project/src/assets/audio/waiting.mp3" type="audio/mpeg">
            Audio not supported
        </audio>
    </div>
</body>
<script>
    window.onload
</script>
</html>