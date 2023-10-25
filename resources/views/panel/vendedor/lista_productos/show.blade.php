@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Producto "{{ $producto->nombre }}"</h1>
            <a href="{{ route('producto.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 100%;">
                    </div>
                    <div class="mb-3">    
                        <h2>Nombre: {{ $producto->nombre }}</h2>
                    </div>
                    <div class="mb-3">
                        <p> Descripción: {{ $producto->descripcion }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Precio: {{ $producto->precio }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Categoria: {{ $producto->categoria->nombre }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Creado por {{ $producto->vendedor->name }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')

@stop