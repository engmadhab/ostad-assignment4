@extends('layouts.app')

@section('content')
    <a href="/contacts"><h1>Create Contact</h1></a>
    
    @if($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif



    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="Name" required>
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="Email" required>
                </div>

                <div class="mb-3">
                    <label for="Phone" class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control" id="Phone" required>
                </div>

                <div class="mb-3">
                    <label for="Address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="Address" required>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div> 


@endsection
