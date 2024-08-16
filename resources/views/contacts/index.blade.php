@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/contacts"><h1>Contacts List</h1> </a>

                <div class="row mb-4">
                    <div class="col-md-8">
                        <form method="GET" action="{{ route('contacts.index') }}">
                            <input type="text" name="search" placeholder="Search by name or email">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-info" href="{{ route('contacts.create') }}">Add New Contact</a>
                    </div>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Name <a href="{{ route('contacts.index', ['sortaz' => 'name']) }}"> a-z </a> <a href="{{ route('contacts.index', ['sortza' => 'name']) }}"> z-a </a></th>
                        <th>Email</th>
                        <th>Date <a href="{{ route('contacts.index', ['sortaz' => 'created_at']) }}"> asc </a><a href="{{ route('contacts.index', ['sortza' => 'created_at']) }}"> desc </a></th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->created_at->toDateString() }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('contacts.show', $contact->id) }}">View</a>
                                <a class="btn btn-warning" href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                                <form action="{{ route('contacts.delete', $contact->id) }}" method="POST" style="display:inline-block;">
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
        </div>
    </div>

@endsection
