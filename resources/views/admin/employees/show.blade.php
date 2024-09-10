@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Profile</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $employee->name }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <!-- Add more fields as necessary -->
            <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-primary">Edit Profile</a>
            <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Profile</button>
            </form>
        </div>
    </div>
    <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary mt-3">Back to All Employees</a>
</div>
@endsection
