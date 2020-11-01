@extends('layout')

@section('titulo', 'Proyectos Eliminados')
    
@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">

            @include('partials._errorLista')
            
            <h4>Papelera de Proyectos</h4>

            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Proyecto</th>
                    <th scope="col">Eliminado</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @forelse ($projectsDeleted as $project)
                        <tr>
                            <th> {{$project->id}} </th>
                            <td> {{ $project->nombre }}</td>
                            <td> {{ $project->deleted_at }} </td>
                            <td>
                                @can('restore', $project)                                    
                                    <form action="{{ route('projects.restore', $project) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-info" type="submit">Restaurar</button>
                                    </form>
                                @endcan

                                @can('forceDelete', $project)                                    
                                    <form action="{{ route('projects.delete-force', $project) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Eliminar definitivamente</button>
                                    </form>
                                @else 
                                    <p class="mb-0 text-secondary">No tiene permitido realizar acciones</p>
                                @endcan

                            </td>
                        </tr>
                    @empty
                          
                    @endforelse
                  </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


@endsection