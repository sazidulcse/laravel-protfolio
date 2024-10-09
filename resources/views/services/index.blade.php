@extends('backend.master')
@section('title', 'Service List')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Service</h1>
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('services.create') }}" class="btn btn-primary">Add Service</a>
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Service Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $key=> $service)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $service->service_name }}</td>
                                    <td>
                                        <img src="{{ url('storage/'.($service->image?$service->image:'images/no-image.png')) }}" alt="{{ $service->image }}"  width="10%">
                                    </td>
                                    <td>
                                        <a href="{{ route('services.edit', $service->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('services.destroy', $service->id) }}"
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
                                    <td colspan="6">No services found</td>
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
