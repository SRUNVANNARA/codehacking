@extends('layouts.admin')




@section('content')


    <h1>Edit users</h1>
    <div class="row">
    <div class="col-sm-3">
        <img width="200" height="200" src="{{$user->photo ? $user->photo->file :'http://placehold.it/400x400'}}" alt="" class="img-circle">
    </div>

    <div class="col-sm-9">
    {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update',$user->id], 'files'=>'true']) !!}

    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role') !!}
        {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active','Status') !!}
        {!! Form::select('is_active',array(1 =>'Active' , 0 =>'Not Active'),null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Photo') !!}
        {!! Form::file('photo_id',null, ['class'=>'form-control-file']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    </div>
    </div>

    <div class="row">
        @include('include.form-error')
    </div>


@stop