@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Profiles</h1>
    <a href="{{ route('admin.employees.create') }}" class="btn btn-success mb-3">Add New Employee</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <a href="{{ route('admin.employees.show', $employee->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
