<?php
    //print_r($courses);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corsi</title>
</head>
<body>
<x-app-layout>
<ul>
    @foreach ($courses as $course)
        <li class="list-group-item">
            <strong>{{$course->name}}</strong>
            <span class="float-end">
                <a type="button" class="btn btn-outline-info" href="/course/{{$course->id}}">
                    Dettagli
                </a>
            </span>
            <span class="float-end">
                <a type="button" class="btn btn-outline-info" href="/course/{{$course->id}}/edit">
                    Modifica
                </a>
            </span>
            <form method="post" action="/course/{{$course->id}}">
                @csrf
                @method('DELETE')
                <button type="submit">
                    Cancella
                </button>
            </form>

            @if(count($course->courseActivity) > 0)
                <ul>
                @foreach ($course->courseActivity as $activity)
                    <li>
                        <a  href="/activity/{{$activity->id}}">{{$activity->name}}</a>
                    </li>
                @endforeach
                </ul>
            @else
                <li>There are no activities yet!</li>
            @endif
        </li>
    @endforeach
</ul>
</x-app-layout>
</body>
</html>
