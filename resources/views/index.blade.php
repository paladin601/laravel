@extends('layouts.base')

@section('header')
    {{ trans('navbar.form') }}
@endsection

@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')

    @guest
        {{ trans('index.logged') }}
    @else
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


    <form method="POST" action="{{ route('store') }}" >
        @csrf
        <div class="form-group">
            <label for="Nombre">{{ trans('index.name') }}</label>
            <input type="text" name="Nombre" class="form-control" value="{{ old('Nombre') }}">
        </div>
    
        <div class="form-group">
            <label for="Apellido">{{ trans('index.lastname') }}</label>
            <input type="text" name="Apellido" class="form-control" value="{{ old('Apellido') }}">
        </div>
    
        <div class="form-group">
            <label for="Cedula">{{ trans('index.ci') }}</label>
            <input type="number" name="Cedula" class="form-control" value="{{ old('Cedula') }}">
        </div>
    
        <div class="form-group">
            <label for="Sexo">{{ trans('index.sex') }}</label>
            <select name="Sexo" class="form-control">
                <option value="M" @if(old('Sexo')=='M') selected @endif >{{ trans('index.male') }}</option>
                <option value="F" @if(old('Sexo')=='F') selected @endif>{{ trans('index.female') }}</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="Edad">{{ trans('index.age') }}</label>
            <input type="number" name="Edad" class="form-control" value="{{ old('Edad') }}">
        </div>
        <div class="form-checkbox">
            <label for="Casado">{{ trans('index.married.question') }}</label>
            <input type="checkbox" id="Casado" name="Casado" @if(old('Casado')) checked @endif>
            <label for="Casado" class="label-checkbox" >Toggle</label>
    
        </div>
    
        <button class="btn btn-success btn-lg btn-block " type='submit'>{{ trans('index.save') }}</button>
    </form>
    @endif
    
          
@endsection
