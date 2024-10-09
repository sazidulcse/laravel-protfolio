@extends('backend.master')
@section('title', 'Add Protfolio')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Protfolio</h1>
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

                <form action="{{ route('protfolios.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="protfolio_name" class="form-label">Protfolio Name</label>
                        <input type="text" class="form-control" id="protfolio_name" name="protfolio_name"
                            value="{{ old('protfolio_name') }}"placeholder="Your Protfolio name :" required>
                    </div>
                    <div class="mb-3">
                        <label for="protfolio_link" class="form-label">Protfolio Link</label>
                        <input type="text" class="form-control" id="protfolio_link" name="protfolio_link"
                            value="{{ old('protfolio_link') }}" placeholder="Full Profolio Link: "required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="selectImage">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Background Image</label>
                        <input type="file" class="form-control" name="bg_image" id="selectImage">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
