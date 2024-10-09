@extends('backend.master')
@section('title', 'Edit Protfolio')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Protfolio</h1>
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('protfolios.update', $protfolio->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="protfolio_name" class="form-label">Protfolio Name</label>
                        <input type="text" class="form-control" id="protfolio_name" name="protfolio_name"
                            value="{{ $protfolio->protfolio_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="protfolio_link" class="form-label">Protfolio Link</label>
                        <input type="text" class="form-control" id="protfolio_link" name="protfolio_link"
                            value="{{ $protfolio->protfolio_link }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="selectImage">
                        <img src="{{ url('storage/'.($protfolio->image?$protfolio->image:'images/no-image.png')) }}" alt="{{ $protfolio->image }}"  width="10%">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Background Image</label>
                        <input type="file" class="form-control" name="bg_image" id="selectImage">
                        <img src="{{ url('storage/'.($protfolio->bg_image?$protfolio->bg_image:'images/no-image.png')) }}" alt="{{ $protfolio->bg_image }}"  width="10%">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
