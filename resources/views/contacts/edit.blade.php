@extends('layouts.app')

@section('content')
<a href="/contacts"><h1 class="mb-4">Edit Contact</h1></a>
    @if($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="Name" value="{{ $contact->name }}" required>
        </div>

        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="Email" value="{{ $contact->email }}" required>
        </div>

        <div class="mb-3">
            <label for="Phone" class="form-label">Phone</label>
            <input type="number" name="phone" class="form-control" id="Phone" value="{{ $contact->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="Address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="Address" value="{{ $contact->address }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
