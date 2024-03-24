<?php
    //print_r($activity);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
</head>
<body>
<x-app-layout>
{{$activity->name}}
{{$activity->description}}
{{$activity->created_at}}

<h2>Reservation:</h2>
@if(count($activity->activityReservation) > 0)
    <ul>
    @foreach ($activity->activityReservation as $reservation)
        <li>
            {{$reservation->begin}} - {{$reservation->end}}
        </li>
    @endforeach
    </ul>
@else
    <li>There are no reservation yet!</li>
@endif
<a href="/reservation/create">reserve</a>
</x-app-layout>
</body>
</html>
