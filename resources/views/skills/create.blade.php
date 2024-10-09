@extends('backend.master')
@section('title', 'Add Skill')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Skill</h1>
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

                <form action="{{ route('skills.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="skill_name" class="form-label">Skill Name</label>
                        <input type="text" class="form-control" id="skill_name" name="skill_name"
                            value="{{ old('skill_name') }}" placeholder="Enter skill name example: Mr. John" required>
                    </div>
                    <div class="mb-3">
                        <label for="percent" class="form-label">Percent</label>
                        <input type="text" class="form-control" id="percent" name="percent"
                            value="{{ old('percent') }}"placeholder="1 to 100 any Integer Value" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
