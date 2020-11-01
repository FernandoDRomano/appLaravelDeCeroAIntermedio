@extends('layout')

@section('titulo', 'Home')

@section('contenido')

    <div class="container">
        <div class="row align-items-md-center">
            <div class="col-12 col-md-6">
                <h1 class="display-4 text-primary">Desarrollo Web</h1>
                <p class="text-secondary lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. At incidunt asperiores aperiam ut aliquam tempora omnis deserunt blanditiis, corporis sunt laboriosam nesciunt odit ea dolores inventore reprehenderit commodi fuga dolorem!</p>

                <a href="{{route('contact')}}" class="btn btn-block btn-lg btn-primary">Contactame</a>
                <a href="{{route('projects.index')}}" class="btn btn-block btn-lg btn-outline-primary">Portafolio</a>

                {{--                 
                    @auth
                        <p>Bienvenido <strong>{{ Auth::user()->name }}</strong></p>    
                    @endauth 
                --}}
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0">
                <img src="/img/home.svg" alt="Desarrollo web" class="img-fluid">
            </div>
        </div>
    </div>

@endsection