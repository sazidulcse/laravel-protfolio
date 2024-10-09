@extends('backend.master')
@section('title', 'Skill List')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Skill</h1>
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('skills.create') }}" class="btn btn-primary">Add Skill</a>
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Skill Name</th>
                                <th>Percent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($skills as $key=> $skill)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $skill->skill_name }}</td>
                                    <td>{{ $skill->percent }}</td>
                                    <td>
                                        <a href="{{ route('skills.edit', $skill->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('skills.destroy', $skill->id) }}"
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
                                    <td colspan="6">No skills found</td>
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
