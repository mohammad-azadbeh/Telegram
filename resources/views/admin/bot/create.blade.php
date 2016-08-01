@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('route' => 'admin.bot.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('Token', 'Token Id*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('Token', old('Token'), array('class'=>'form-control')) !!}
        
    </div>
    <input name="user_id" type="hidden" value="{{$user->id}}">
</div>
{{--<div class="form-group">--}}
    {{--{!! Form::label('user_id', 'User*', array('class'=>'col-sm-2 control-label')) !!}--}}
    {{--<div class="col-sm-10">--}}
        {{--{!! Form::select('user_id', $user, old('user_id'), array('class'=>'form-control')) !!}--}}
        {{----}}
    {{--</div>--}}
{{--</div>--}}

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection