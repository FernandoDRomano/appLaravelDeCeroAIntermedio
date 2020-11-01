@extends('layout')

@section('titulo', 'Portfolio')

@section('contenido')
    
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="text-center display-4">@lang('Projects') | {{$projects->count()}}</h1>   
                    {{-- SI ESTA AUTENTICADO MUESTRO EL BOTÓN PARA CREAR UN PROYECTO --}}
                    @auth
                        @can('create', $newProject)
                            <a href="{{ route('projects.create') }}" class="btn btn-primary">Nuevo proyecto</a>
                        @endcan
                    @endauth
                </div>

                <p class="text-black-50 lead">Proyectos realizados Lorem ipsum dolor sit, amet consectetur Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic possimus dolorem repellendus incidunt deleniti eveniet. adipisicing elit. Nesciunt non iusto blanditiis praesentium sed.</p>

                {{-- <ul class="list-group">
                    @forelse ($projects as $project)
                        <li class="list-group-item border-0 mb-3 shadow-sm"> 
                            <a 
                                href="{{ route('projects.show', $project) }}"
                                class="d-flex justify-content-between align-items-center text-decoration-none">

                                    <span class="text-secondary font-weight-bold lead">
                                        {{ $project->nombre }}
                                    </span>
                                    <small class="text-black-50">
                                        {{ $project->created_at->format('d-m-Y') }}
                                    </small>
                            </a>    
                        </li>
                    @empty
                        <li>No hay proyectos</li>
                    @endforelse
                </ul> --}}

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
                                        <p class="text-small text-muted text-black-50 mb-0">Sin Categoría</p>
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