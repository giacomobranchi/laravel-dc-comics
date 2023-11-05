@extends('layout.app')

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">

            <h1 class="text-muted text-center my-3">ADMIN COMIC DETAILS PAGE</h1>

            <div class="col-8 py-5 position-relative">

                <div class="col-2">
                    @if (str_contains($comics->thumb, 'http'))
                        <td><img class=" img-fluid" style="height: 250px" src="{{ $comics->thumb }}" alt="{{ $comics->title }}">
                        </td>
                    @else
                        <td><img class=" img-fluid" style="height: 250px" src="{{ asset('storage/' . $comics->thumb) }}">
                        </td>
                    @endif
                </div>

                <div class="row">

                    <div class="col-8">

                        <h2 class="text-uppercase fw-bold text-dark">{{ $comics->title }}</h2>

                        <p><strong>Description: </strong>{{ $comics->description }}</p>

                        <p><strong>Artists: </strong>{{ $comics->artists }}</p>

                        <p><strong>Writers: </strong>{{ $comics->writers }}</p>

                        <a class="btn btn-primary" href="{{ route('comics.index') }}">Back to Dashboard</a>

                    </div>

                    <div class="col">

                        <img src="{{ Vite::asset('resources/img/adv.jpg') }}" alt="advertisement">

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
