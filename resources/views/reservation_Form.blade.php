<?php
    //dd($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
</head>
<body>
    hello
    <x-app-layout>
    <!-- il valore di action è quello indicato nella route:list che fa riferimento al metodo store del projectController -->
    <form method="post" action="/reservation">
        @csrf
        <label for="name">begin:</label><br>
        <input
            type="datetime-local"
            name="begin"
            value="2018-06-12T19:30"
            min="2018-06-07T00:00"
            max="2018-06-14T00:00" /><br>
        <label for="description">end:</label><br>
        <!-- aggiungere inizio di attività alla tabella attività per aggiungerlo al value-->
        <input
            type="datetime-local"
            name="end"
            value="2018-06-12T19:30"
            min="2018-06-07T00:00"
            max="2018-06-14T00:00" /><br><br>
        <input type="submit" value="Submit">

    </form>
    </x-app-layout>
</body>
</html>
