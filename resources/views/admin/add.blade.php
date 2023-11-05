@extends('layout.app')

@section('content')
    <div class="container-fluid dc-mainContainer">

        <div class="row justify-content-center">

            <div class="col-8 py-5">

                <h1 class="text-center">New Comic:</h1>

                <div class="bg-light-subtle p-3 rounded rounded-3">

                    <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">

                            <label for="title" class="form-label"><strong>TITLE</strong></label>

                            <input type="text" class="form-control" name="title" id="title"
                                aria-describedby="helpTitle" placeholder="Insert Title Here!">
                        </div>

                        <div class="mb-3">

                            <label for="price" class="form-label"><strong>PRICE</strong></label>

                            <input type="text" class="form-control" name="price" id="price"
                                aria-describedby="helpprice" placeholder="Insert Price Here!">

                        </div>

                        <div class="mb-3">

                            <label for="series" class="form-label"><strong>SERIES</strong></label>

                            <input type="text" class="form-control" name="series" id="series"
                                aria-describedby="helpseries" placeholder="Insert Series Here!">

                        </div>

                        <div class="mb-3">

                            <label for="thumb" class="form-label"><strong>THUMBNAIL</strong></label>

                            <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Cerca..."
                                aria-describedby="fileHelpThumb">

                        </div>

                        <button type="submit" class="btn btn-success my-3">EDIT</button>

                    </form>


                </div>



            </div>

        </div>

    </div>
@endsection
