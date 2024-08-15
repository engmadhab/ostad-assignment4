@extends('layouts.app')

@section('content')
    <h1>Contact Details</h1>

    <p>Name: {{ $contact->name }}</p>
    <p>Email: {{ $contact->email }}</p>
    <p>Phone: {{ $contact->phone }}</p>
    <p>Address: {{ $contact->address }}</p>
    <p>Created At: {{ $contact->created_at }}</p>
    <p>Updated At: {{ $contact->updated_at }}</p>

    <a href="{{ route('contacts.index') }}">Back to Contacts</a>
@endsection
