@extends('backend.master')
@section('title', 'Protfolio List')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Protfolio</h1>
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('protfolios.create') }}" class="btn btn-primary">Add Protfolio</a>
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Protfolio Name</th>
                                <th>Protfolio Link</th>
                                <th>Image</th>
                                <th>Background Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($protfolios as $key=> $protfolio)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $protfolio->protfolio_name }}</td>
                                    <td>{{ $protfolio->protfolio_link }}</td>
                                    <td>
                                        <img src="{{ url('storage/'.($protfolio->image?$protfolio->image:'images/no-image.png')) }}" alt="{{ $protfolio->image }}"  width="10%">
                                    </td>
                                    <td>
                                        <img src="{{ url('storage/'.($protfolio->bg_image?$protfolio->bg_image:'images/no-image.png')) }}" alt="{{ $protfolio->bg_image }}"  width="10%">
                                    </td>
                                    <td>
                                        <a href="{{ route('protfolios.edit', $protfolio->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('protfolios.destroy', $protfolio->id) }}"
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
                                    <td colspan="6">No protfolios found</td>
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
