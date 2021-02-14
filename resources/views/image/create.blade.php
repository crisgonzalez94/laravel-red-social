@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Subir una nueva imagen</div>

                <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                    @csrf

                    <br>
                    <div class="form-group row">
                        <label for="decription" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                        <div class="col-md-6">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" name="description" required></textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image_path" class="col-md-4 col-form-label text-md-right">Imagen</label>

                        <div class="col-md-6">
                            <input id="image_path" type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path" required utofocus>

                            @error('image_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--Submit-->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Subir imagen
                            </button>
                        </div>
                    </div>
                    <!----------->
                    <br>

                </form>

            </div>


        </div>
    </div>
</div>
@endsection