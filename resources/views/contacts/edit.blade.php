@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Contact</h2>

        <form class="p-3 mb-2 bg-light text-dark" action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $contact->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $contact->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $contact->phone }}">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $contact->address }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Contact</button>
        </form>
    </div>
@endsection
