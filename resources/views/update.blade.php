@extends('layouts.base')

@section('header')
{{ trans('index.edit.form') }}
@endsection

@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ trans(session()->get('success'))}}</strong>
    </div>
@endif
@if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ trans('index.error.generic') }}</strong>
        </div>
        @foreach (session()->get('error') as $error_message)            
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ trans($error_message) }}</strong>
            </div>
        @endforeach
    @endif

<form method="POST" action="{{ route('update.store') }}" >
        @csrf
        <div class="form-group">
            <label for="Nombre">{{ trans('index.name') }}</label>
            <input type="text" name="Nombre" class="form-control" value="{{ old('Nombre',$user->Nombre) }}">
        </div>
    
        <div class="form-group">
            <label for="Apellido">{{ trans('index.lastname') }}</label>
            <input type="text" name="Apellido" class="form-control" value="{{ old('Apellido',$user->Apellido) }}">
        </div>
    
        <div class="form-group">
            <label for="Cedula">{{ trans('index.ci') }}</label>
            <input type="number" name="Cedula" class="form-control" value="{{ old('Cedula',$user->Cedula) }}" readonly>
        </div>
    
        <div class="form-group">
            <label for="Sexo">{{ trans('index.sex') }}</label>
            <select name="Sexo" class="form-control">
                <option value="M" @if(old('Sexo',$user->Sexo)=='M') selected @endif >{{ trans('index.male') }}</option>
                <option value="F" @if(old('Sexo',$user->Sexo)=='F') selected @endif>{{ trans('index.female') }}</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="Edad">{{ trans('index.age') }}</label>
            <input type="number" name="Edad" class="form-control" value="{{ old('Edad',$user->Edad) }}">
        </div>
        <div class="form-checkbox">
            <label for="Casado">{{ trans('index.married.question') }}</label>
            <input type="checkbox" id="Casado" name="Casado" @if(old('Casado',$user->Casado)) checked @endif>
            <label for="Casado" class="label-checkbox" >Toggle</label>
    
        </div>
    
    <button class="btn btn-success btn-lg btn-block " type='submit'>{{ trans('index.update') }}</button>
    <a class="btn btn-danger btn-lg btn-block " type='button' href="{{ route('detail') }}">{{ trans('index.cancel') }}</a>
</form>


@endsection