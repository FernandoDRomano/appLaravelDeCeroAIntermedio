@extends('layout')

@section('titulo', 'Contact')

@section('contenido')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">

            {{-- 

                ESTA ES UNA MANERA DE IMPRIMIR TODOS LOS ERRORES DE UN FORMULARIO

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif 
            --}}
                
            <form action="{{ route('contact.store') }}" method="post" class="bg-white my-5 py-3 px-4 shadow rounded">
                @csrf

                <h1 class="text-center display-4">@lang('Contact')</h1>   
                
                <hr>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input 
                        type="text" 
                        name="nombre" 
                        id="nombre" 
                        placeholder="Ingresar tu nombre" 
                        class="@error('nombre') is-invalid @else border-0 @enderror form-control bg-light shadow-sm">

                    @error('nombre')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                    @enderror

                    {{--
                        ESTA ES UNA FORMA DE MOSTRAR LOS ERRORES EN LINEA 
                        @if ($errors->first('nombre'))
                            <small> {{ $errors->first('nombre') }} </small>
                        @endif 
                    --}}

                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="Ingresar tu email"
                        class="@error('email') is-invalid @else border-0 @enderror form-control bg-light shadow-sm">
                    
                    @error('email')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input 
                        type="text" 
                        name="asunto" 
                        id="asunto" 
                        placeholder="Ingresar el asunto"
                        class="@error('asunto') is-invalid @else border-0 @enderror form-control bg-light shadow-sm">

                    @error('asunto')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea 
                        name="mensaje" 
                        id="mensaje" 
                        rows="5" 
                        placeholder="Ingresa tu mensaje"
                        class="@error('mensaje') is-invalid @else border-0 @enderror form-control bg-light shadow-sm">
                    </textarea>

                    @error('mensaje')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg">Enviar</button>
            </form>
        </div>
    </div>
</div>

@endsection