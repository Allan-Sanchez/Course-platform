<header>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a href="{{url('/')}}" class="navbar-brand">
                {{config('app.name')}}
            </a>
            
            <button class="navbar-toggler" data-toggle="collapse" data-targer="#navbarContent" aria-expanded="false" aria-controls="navbarContent"> 
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                {{-- left side of navbar --}}
                <ul class="navbar-nav mr-auto">

                </ul>
                {{-- right side of navbar --}}
                <ul class="navbar-nav ml-auto">
                    @include('partials.navigations.'. \App\User::navigation())

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__("select a language")}}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="{{route('set_language',['es'])}}" class="dropdown-item">
                            {{__("spanish")}}
                        </a>

                        <a href="{{route('set_language',['en'])}}" class="dropdown-item">
                            {{__("english")}}
                        </a>
                    </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

