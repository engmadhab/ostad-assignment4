@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/contacts"><h1>Contacts</h1> </a>

                <form method="GET" action="{{ route('contacts.index') }}">
                    <input type="text" name="search" placeholder="Search by name or email">
                    <button type="submit">Search</button>
                </form>

                <a href="{{ route('contacts.create') }}">Add New Contact</a>

                <table class="table dark">
                    <thead>
                    <tr>
                        <th><a href="{{ route('contacts.index', ['sort' => 'name']) }}">Name</a></th>
                        <th><a href="{{ route('contacts.index', ['sort' => 'created_at']) }}">Created At</a></th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td>
                                <a href="{{ route('contacts.show', $contact->id) }}">View</a>
                                <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                                <form action="{{ route('contacts.delete', $contact->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
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
