@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Contact Details</h2>

        <div>
            <strong>Name:</strong> {{ $contact->name }}
        </div>
        <div>
            <strong>Email:</strong> {{ $contact->email }}
        </div>
        <div>
            <strong>Phone:</strong> {{ $contact->phone }}
        </div>
        <div>
            <strong>Address:</strong> {{ $contact->address }}
        </div>
        <div>
            <strong>Created At:</strong> {{ $contact->created_at }}
        </div>
        <div>
            <strong>Updated At:</strong> {{ $contact->updated_at }}
        </div>
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning mt-3">Edit</a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">Delete</button>
        </form>
    </div>
@endsection
