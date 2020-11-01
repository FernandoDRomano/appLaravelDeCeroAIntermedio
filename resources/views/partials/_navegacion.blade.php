<nav class="navbar bg-white navbar-expand-lg shadow-sm">
    
    <div class="container">

        <a href="{{route('home')}}" class="navbar-brand">
            {{config('app.name')}}
        </a>
    
        <button 
            class="navbar-toggler navbar-light" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarContenidoItems" 
            aria-controls="navbarContenidoItems" 
            aria-expanded="false" 
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarContenidoItems">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a 
                        href="{{ route('home') }}" 
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        >
                        @lang('Home')
                    </a>
                </li>
                <li class="nav-item">
                    <a 
                        href="{{ route('projects.index') }}" 
                        class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}"
                        >
                        @lang('Projects')
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a 
                            href="{{ route('deleted') }}" 
                            class="nav-link {{ request()->routeIs('deleted') ? 'active' : '' }}"
                            >
                            @lang('Trash')
                        </a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a 
                        href="{{ route('about') }}" 
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        >
                        @lang('About')
                    </a>
                </li>
                <li class="nav-item">
                    <a 
                        href="{{ route('contact') }}" 
                        class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                        >
                        @lang('Contact')
                    </a>
                </li>
    
                {{-- 
                    @auth @endauth SON DIRECTIVAS PARA HACER ALGO MIENTRAS EL USUARIO ESTA AUTENTICADO 
                    @guest @endguest SON DIRECTIVAS PARA HACER ALGO MIENTRAS NO EXISTA UN USUARIO AUTENTICADO
                    
                    AMBAS DIRECTIVAS PUEDEN TENER UN @else INDICANDO QUE HACER SI NO SE CUMPLE DICHA DIRECTIVA
                --}}
    
                {{-- SI EL USUARIO ESTA AUTENTICADO LE MUESTRO LA OPCIÓN DEL MENU PARA CERRAR LA SESIÓN --}}
                @auth
    
                    <li class="nav-item">
                        <a 
                            href="#"
                            onclick="event.preventDefault(); document.getElementById('formLogout').submit();" 
                            class="nav-link {{ request()->routeIs('logout') ? 'active' : '' }}"
                            >
                            @lang('Logout')
                        </a>
                    </li>
    
                    <form id="formLogout" action="{{route('logout')}}" method="POST" class="display: none;">
                        @csrf
                    </form>
                
                {{-- SI NO ESTA LOGUEADO, LE MUESTRO EL ENLACE PARA LOGUEARSE --}}
                @else
    
                    <li class="nav-item">
                        <a 
                            href="{{ route('login') }}" 
                            class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                            >
                            @lang('Login')
                        </a>
                    </li>
    
                @endauth
    
    
            </ul>
            
        </div>

    </div>
    
</nav>