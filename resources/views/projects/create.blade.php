@extends('layout')

@section('titulo', 'Nuevo Proyecto')
    
@section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
            
                @include('partials._errorLista')

                <form 
                    action="{{ route('projects.store') }}" 
                    method="POST" 
                    class="bg-white shadow rounded py-3 px-4"
                    enctype="multipart/form-data">

                        <h2 class="text-center display-4">Nuevo Proyecto</h2>
                        <hr>
                        @include('projects._form', ['btnText' => 'Agregar'])
                    
                        
                </form>

            </div>
        </div>
    </div>
    
@endsection
