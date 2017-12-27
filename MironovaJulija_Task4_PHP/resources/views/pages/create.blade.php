@extends('layouts.app')

@section('content')
<H3 align="center">Write a New News</H3>
<hr/>

  {!! Form::open(['url'=>'news']) !!}
    <div class="form-group col-md-6 col-md-offset-3">
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
      {!! Form::label('description', 'Description:') !!}
      {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
      {!! Form::label('link', 'Link:') !!}
      {!! Form::text('link', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
      {!!Form::select('id_category', $categories_array, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
      {!! Form::submit('Add news', ['class'=>'btn btn-info form-control']) !!}
    </div>
  {!! Form::close() !!}
@endsection

