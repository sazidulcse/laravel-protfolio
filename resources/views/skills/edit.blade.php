@extends('backend.master')
@section('title', 'Edit Skill')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Skill</h1>
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

                <form action="{{ route('skills.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="skill_name" class="form-label">Skill Name</label>
                        <input type="text" class="form-control" id="skill_name" name="skill_name"
                            value="{{ $skill->skill_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="percent" class="form-label">Percent</label>
                        <input type="text" class="form-control" id="percent" name="percent"
                            value="{{ $skill->percent }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
