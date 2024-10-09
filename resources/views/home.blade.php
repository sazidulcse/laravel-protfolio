@extends('backend.master')
@section('title', 'dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ __('Dashboard') }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Profile</h1>
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
    
                    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="profession" class="form-label">Profession</label>
                            <input type="text" class="form-control" id="profession" name="profession"
                                value="{{ $profile->profession }}"placeholder="Your Profession" required>
                        </div>
                        <div class="mb-3">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input type="text" class="form-control" id="twitter" name="twitter"
                                value="{{ $profile->twitter }}" placeholder="Twitter Usarname"required>
                        </div>
                        <div class="mb-3">
                            <label for="fb" class="form-label">Facebook</label>
                            <input type="text" class="form-control" id="fb" name="fb"
                                value="{{ $profile->fb }}"placeholder="Facebook User name" required>
                        </div>
                        <div class="mb-3">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin"
                                value="{{ $profile->linkedin }}"placeholder="Linkdin Username name" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Age</label>
                            <input type="text" class="form-control" id="position" name="age"
                                value="{{ $profile->age }}" placeholder="Total Birth Year"required>
                        </div>
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="company_name" name="phone"
                                value="{{ $profile->phone }}" placeholder="Contact Number"required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $profile->address }}"placeholder="Your Address Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ $profile->description }}" placeholder="About You"required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status"
                                value="{{ $profile->status }}"placeholder="Active or Deactive" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="selectImage">
                            <img src="{{ url('storage/'.($profile->image?$profile->image:'images/no-image.png')) }}" alt="{{ $profile->image }}"  width="10%">

                        </div>
    
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
