@extends('layouts.app')

@section('content')

    <h1 class="mb-4">Contact Details</h1>

    <p><strong> Name:</strong> {{ $contactDetails->name }}</p>
    <p><strong> Email:</strong> {{ $contactDetails->email }}</p>
    <p><strong> Phone:</strong> {{ $contactDetails->phone }}</p>
    <p><strong> Address:</strong> {{ $contactDetails->address }}</p>
    <p><strong> Created At:</strong> {{ $contactDetails->created_at }}</p>
    <p><strong> Updated At:</strong> {{ $contactDetails->updated_at }}</p>

    <a class="btn btn-info" href="{{ route('contacts.index') }}">Back to Contacts</a>
@endsection
