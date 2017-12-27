@extends('layouts.app')

@section('content')
<h2>{{$showOneNews->title}}</h2>
<hr/>
<p style="margin-top: 2em;"><h4>{{$showOneNews->description}}</h4></p>
<h5><br/>{{$showOneNews->pubDate}}</h5>
<h5><br/>Link: <a href="{{$showOneNews->link}}" target="_blank">{{$showOneNews->link}}</a></h5>
@endsection