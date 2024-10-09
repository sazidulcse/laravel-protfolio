@extends('backend.master')
@section('title', 'User List')
@section('content')
@push('css')
<style>
    <style>
    .label {
        display: inline-block;
        padding: .2em .6em;
        font-size: 75%;
        font-weight: 700;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
    }

    .label-success {
        background-color: #5cb85c;
    }

    .label-danger {
        background-color: #d9534f;
    }
</style>
</style>
@endpush
<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-4">
    
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr id="user-{{ $user->id }}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <label id="status-{{ $user->id }}" class="{{ $user->is_active ? 'label label-success' : 'label label-danger' }}">
                                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                                        </label>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary toggle-status" data-id="{{ $user->id }}">
                                            {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.toggle-status').click(function() {
            var userId = $(this).data('id');
            var button = $(this);
            var statusLabel = $('#status-' + userId);

            $.ajax({
                url: "{{ route('users.toggleStatus', '') }}/" + userId,
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.success) {
                        var newStatus = response.is_active ? 'Active' : 'Inactive';
                        statusLabel.text(newStatus);
                        statusLabel.toggleClass('label-success label-danger');
                        button.text(response.is_active ? 'Deactivate' : 'Activate');
                    }
                }
            });
        });
    });
</script>
@endpush
