@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Profile</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <!-- Add more fields as necessary -->
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            <form action="{{ route('profile.destroy') }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
