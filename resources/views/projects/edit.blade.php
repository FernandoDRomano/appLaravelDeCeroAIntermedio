@extends('layout')

@section('titulo', 'Editar Proyecto')
    
@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">

            @include('partials._errorLista')
            
            <form 
                action="{{ route('projects.update', $project) }}" 
                method="POST"
                class="bg-white shadow rounded py-3 px-4"
                enctype="multipart/form-data">
                    <h2 class="display-4 text-center">Editar Proyecto</h2>
                    <hr>
                    @method('PATCH')
                    @include('projects._form', ['btnText' => 'Editar'])
            </form>

        </div>
    </div>
</div>


@endsection