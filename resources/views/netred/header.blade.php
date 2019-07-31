<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>賽事線上報名系統</title>

    <!-- CSS -->
    <link rel="stylesheet"  href="{{ url('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet"  href="{{ url('css_register/style.css')}}">
    <script type="text/javescript" src="{{ url('https://code.jquery.com/jquery-1.12.4.js') }}"></script>
    <script type="text/javascript" src="{{ url('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}  "></script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker();
        } );
    </script>
</head>
<body>