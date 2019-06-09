@extends('layouts.base')

@section('header')
    Formulario
@endsection

@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')

    @guest
        Es necesario iniciar sesion
    @else
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Corregir los siguientes errores en el formulario</strong>
        </div>
        @foreach (session()->get('error') as $error_message)            
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{$error_message}}</strong>
            </div>
        @endforeach
    @endif


    <form method="POST" action="{{ route('store') }}" >
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" name="Nombre" class="form-control" value="{{ old('Nombre') }}">
        </div>
    
        <div class="form-group">
            <label for="Apellido">Apellido</label>
            <input type="text" name="Apellido" class="form-control" value="{{ old('Apellido') }}">
        </div>
    
        <div class="form-group">
            <label for="Cedula">Cedula</label>
            <input type="number" name="Cedula" class="form-control" value="{{ old('Cedula') }}">
        </div>
    
        <div class="form-group">
            <label for="Sexo">Sexo</label>
            <select name="Sexo" class="form-control">
                <option value="M" @if(old('Sexo')=='M') selected @endif >Masculino</option>
                <option value="F" @if(old('Sexo')=='F') selected @endif>Femenino</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="Edad">Edad</label>
            <input type="number" name="Edad" class="form-control" value="{{ old('Edad') }}">
        </div>
        <div class="form-checkbox">
            <label for="Casado">Usted esta Casado?</label>
            <input type="checkbox" id="Casado" name="Casado" @if(old('Casado')) checked @endif>
            <label for="Casado" class="label-checkbox" >Toggle</label>
    
        </div>
    
        <button class="btn btn-success btn-lg btn-block " type='submit'>Guardar</button>
    </form>
    @endif
    
          
@endsection
