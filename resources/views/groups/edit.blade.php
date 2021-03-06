@extends('layouts.app')

@section('content')
    <h1>Edit Group</h1>
    {!! Form::open(['action' => ['GroupsController@update', $group->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $group->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('description', 'Group Description')}}
        {{ Form::textarea('description',$group->description,['class' => 'form-control','placeholder'=>' Description']) }}
    </div>   
    
   @php
        $min = $group->users_count < 2 ? 2 : $group->users_count;      

    @endphp

    <div class="form-group">
        {{ Form::label('max_size', 'Max Group Size') }}        
        {{ Form::number('max_size',  $group->max_size,['class' => 'form-control', 'id'=>'max_size', 'min'=>$min]) }}
    </div>

    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}



@endsection