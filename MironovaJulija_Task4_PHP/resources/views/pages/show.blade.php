@extends('layouts.app')

@section('content')
<h2>{{$showOneNews->title}}</h2>
<hr/>
<h5>{{$showOneNews->pubDate}}</h5>
<p style="margin-top: 2em;"><h4>{{$showOneNews->description}}</h4></p>
<h5><br/>Category: {{$category_name}}</h5>
<h5><br/>Link: <a href="{{$showOneNews->link}}" target="_blank">{{$showOneNews->link}}</a></h5>
<p style="margin-top: 2em;"><a href="{{ action('NewsController@index')}}" class="btn btn-info" role="button">Back</a></p>
@endsection