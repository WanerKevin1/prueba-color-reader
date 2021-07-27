<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <link rel="stylesheet" href="public\css\myStyle.css">
    <title>Document</title>
</head>
<body>
   <div class="jumbotron" id="centralBox">
        <h2>Level test</h2>
        <span>Color reader</span>
        <br>
        <br>
        <div>
            <form method="POST" action="{{url('/sendPic')}}" file="true" enctype="multipart/form-data">
                @csrf
                <input type="file" accept="image/png, image/jpeg" name="imgRead">
                <br>
                <br>
                <input type="submit">
            </form>
        </div>
   </div>
</body>
</html>