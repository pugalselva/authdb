@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <!-- Add more fields as necessary -->

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
