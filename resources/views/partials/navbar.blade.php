<div class="row justify-content-center">

    <div class="col-8 p-0">

        <nav class="navbar navbar-expand-lg py-0">

            <a class="navbar-brand flex-grow-1" href="#"><img
                    src="{{ Vite::asset('resources/img/dc-logo.png') }}"></a>

            <div class="navbar-nav d-flex justify-content-between text-uppercase"">

                @foreach (config('navbar-links') as $link)
                    <a class="nav-link px-4 py-5 {{ Route::currentRouteName() === $link['path'] ? 'dc-active' : '' }}"
                        href="{{ Route($link['path']) }}">
                        {{ $link['text'] }}
                    </a>
                @endforeach

            </div>

            <div class="col-1 d-flex justify-content-center align-items-center ">

                <a class="btn btn-success" href="{{ route('comics.index') }}">ADMIN</a>
            </div>

        </nav>

    </div>

</div>
