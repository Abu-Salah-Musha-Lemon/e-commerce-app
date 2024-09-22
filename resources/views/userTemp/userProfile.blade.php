@extends('userTemp.layout.user')

@section('userProfile')
    <h4>User Profile</h4>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <!-- Add more user details as needed -->
@endsection
