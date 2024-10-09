@extends('backend.master')
@section('title', 'Experiences List')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Experiences</h1>
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('experiences.create') }}" class="btn btn-primary">Add Experience</a>
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Position</th>
                                <th>Company Name</th>
                                <th>Duration</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($experiences as $key=> $experience)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $experience->position }}</td>
                                    <td>{{ $experience->company_name }}</td>
                                    <td>{{ $experience->duration }}</td>
                                    <td>{{ $experience->description }}</td>
                                    <td>
                                        <a href="{{ route('experiences.edit', $experience->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('experiences.destroy', $experience->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No experiences found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
