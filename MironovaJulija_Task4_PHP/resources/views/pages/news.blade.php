@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Publication date</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $n)
            <tr>
            <th scope="row">{{$n->title}}</th>
            <td>{{$n->pubDate}}</td>
            <td><a href="{{ action('NewsController@show', [$n->id])}}">More info</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection