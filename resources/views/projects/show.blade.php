@extends('layout')

@section('titulo', $project->nombre)

@section('contenido')

    <div class="container">

            @if ($project->imagen)
                <div class="row">
                    <img class="imagen-project" src="/storage/{{ $project->imagen }}" alt="{{ $project->nombre }}">
                </div>
            @endif

            <div class="row justify-content-center margin-negativo">
                <div class="col-12 col-md-10">
                    <div class="bg-white p-5 shadow rounded">
                        <h1 class="text-center display-4">{{$project->nombre}}</h1>
                        <p class="lead text-secondary">{{$project->descripcion}}</p>
                        <p class="text-small text-black-50"><small>{{$project->created_at->diffForHumans()}}</small></p>
    
                        <div class="d-flex justify-content-between">
                            <a href="{{route('projects.index')}}">Regresar</a>
    
                            {{-- SI ESTA AUTENTICADO LE MUESTRO LOS BOTONES PARA EDITAR Y ELIMINAR --}}
                            @auth
                                
                                <div class="btn-group btn-group-sm">

                                    @can('update', $project)
                                        <a class="btn btn-info text-white" href="{{route('projects.edit', $project)}}">Editar</a>
                                    @endcan

                                    @can('delete', $project)
                                        <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('formEliminar').submit()">Eliminar</a>
                                    @endcan

                                </div>
        
                                <form id="formEliminar" action="{{route('projects.destroy', $project)}}" method="POST" style="display: none">
                                    @csrf
                                    @method('DELETE')
                                </form>
    
                            @endauth
                        </div>
    
                    </div>
                </div>
            </div>
    </div>


@endsection