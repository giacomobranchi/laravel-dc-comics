@extends('layout.app')

@section('content')
    <div class="container-fluid dc-mainContainer">

        <div class="row justify-content-center">

            <div class="col-8 py-5">

                <h1 class="text-center">Editing: {{ $comic->title }} - ID: {{ $comic->id }} </h1>

                <div class="bg-light-subtle p-3 rounded rounded-3">

                    <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">

                            <label for="title" class="form-label"><strong>Title</strong></label>

                            <input type="text" class="form-control" name="title" id="title"
                                aria-describedby="helpTitle" value="{{ $comic->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">

                            <label for="price" class="form-label"><strong>Price</strong></label>

                            <input type="text" class="form-control" name="price" id="price"
                                aria-describedby="helpprice" value="{{ $comic->price }}">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="series" class="form-label"><strong>Series</strong></label>

                            <input type="text" class="form-control" name="series" id="series"
                                aria-describedby="helpseries" value="{{ $comic->series }}">
                            @error('series')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <div class="mb-3">

                                @if (str_contains($comic->thumb, 'http'))
                                    <td><img class=" img-fluid" style="height: 100px" src="{{ $comic->thumb }}"
                                            alt="{{ $comic->title }}"></td>
                                @else
                                    <td><img class=" img-fluid" style="height: 100px"
                                            src="{{ asset('storage/' . $comic->thumb) }}"></td>
                                @endif

                            </div>

                            <label for="thumb" class="form-label"><strong>Choose a thumbnail</strong></label>

                            <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Cerca..."
                                aria-describedby="fileHelpThumb">
                            @error('thumb')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-success my-3">SAVE</button> <a class="btn btn-primary m-3"
                            href="{{ route('comics.index') }}">Back to Dashboard</a>

                    </form>


                </div>



            </div>

        </div>

    </div>
@endsection
