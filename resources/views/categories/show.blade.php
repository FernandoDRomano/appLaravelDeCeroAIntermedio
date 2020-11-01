@extends('layout')

@section('titulo', 'Portfolio')

@section('contenido')
    
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="text-center display-4"> {{ $projects->first()->category->nombre }} | ({{$projects->count()}}) </h1>   
                    {{-- SI ESTA AUTENTICADO MUESTRO EL BOTÓN PARA CREAR UN PROYECTO --}}
                    @auth
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">Nuevo proyecto</a>
                    @endauth
                </div>

                <div class="row">
                    @forelse ($projects as $project)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card mb-3 shadow-sm border-0">
                                @if ($project->imagen)
                                    <img src="/storage/{{ $project->imagen }}" class="card-img-top" style="height: 200px; object-fit: cover" alt="{{$project->nombre}}">
                                @endif
                                <div class="card-body">
                                    <h5 class="text-center card-title text-primary font-weight-bold lead">{{ $project->nombre }}</h5>
                                    <p class="card-text text-truncate text-black-50"> {{ $project->descripcion }}</p>

                                    @if ($project->category)
                                        <a href="{{ route('categories.show', $project->category) }}" class="badge badge-dark"> {{ $project->category->nombre }}</a>
                                    @else
                                        <a href="#" class="badge badge-dark">Sin Categoría</a>
                                    @endif

                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <small class="font-weight-lighter text-black-50 mb-0">{{ $project->created_at->diffForHumans() }}</small>
                                    <a href="{{ route('projects.show', $project) }}" class="btn btn-primary btn-sm">Ver más</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No existen proyectos aun!</p>
                    @endforelse
                </div>

                {{ $projects->links() }}

            </div>
        </div>
    </div>

@endsection