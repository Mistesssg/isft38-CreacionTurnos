@extends('backend.layouts.main')
@section('title', __('noticias.index'))
@section('content')
<div class="Inicio">
    <h1 class="TextoInicio">{{__('noticias.nueva')}}</h1>
</div>
<div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
</div>
<div class="links">
    {{ Form::open(['route' => 'noticias.store', 'files' => true]) }}
    @csrf
    <!-- {{ csrf_field() }} -->
    <div class="form-group @if($errors->has('titulo')) has-error has-feedback @endif">
        {{ Form::label("titulo", __('noticias.titulo'), ['class' => 'control-label']) }}
        {{Form::text("titulo", old("titulo"), ["class" => "form-control", "placeholder" => "", ])}}
        @error('titulo')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("cuerpo", __('noticias.cuerpo'), ['class' => 'control-label']) }}
        {{Form::textarea("cuerpo", old("cuerpo"), ["class" => "form-control", "placeholder" => "", ])}}
        @error('cuerpo')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group @if($errors->has('imagen')) has-error has-feedback @endif">
        {{ Form::label("imagen", __('noticias.imagen'), ['class' => 'control-label']) }}
        {{ Form::file("imagen") }}
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("autor", __('noticias.autor'), ['class' => 'control-label']) }}
        {{Form::select("autor", $users, null, ["class" => "form-control", "placeholder" => ""]) }}
        @error('autor')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("carrera_id", __('noticias.carrera'), ['class' => 'control-label']) }}
        {{Form::select("carrera_id", $carreras, null, ["class" => "form-control", "placeholder" => ""]) }}
        @error('carrera_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group @if($errors->has('archivo1')) has-error has-feedback @endif">
        {{ Form::label("archivo1", "Archivo", ['class' => 'control-label']) }}
        {{ Form::file("archivo1") }}
        @error('archivo')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <div class="form-group @if($errors->has('archivo1')) has-error has-feedback @endif">
        {{ Form::label("archivo2", "Archivo", ['class' => 'control-label']) }}
        {{ Form::file("archivo2") }}
        @error('archivo2')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <div class="form-group @if($errors->has('archivo1')) has-error has-feedback @endif">
        {{ Form::label("archivo3", "Archivo", ['class' => 'control-label']) }}
        {{ Form::file("archivo3") }}
        @error('archivo3')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <div class="form-group">
        {{ Form::label("etiqueta_id", __('noticias.etiquetas'), ['class' => 'control-label']) }}
        @foreach($etiquetas as $id => $nombre)
        <div class="form-check form-check-inline">
            <span class="badge bg-primary">
                {{ Form::checkbox('etiqueta'.$id, $id, null, ['class' => 'check-input']) }}{{ Form::label($id, $nombre, ['class' => 'check-label']) }}
            </span>
        </div>
        @endforeach

    </div>
    </br><button type="submit" class="btn btn-success form-control">{{__('noticias.guardar')}}</button>
</div>
{!!Form::close()!!}
@endsection