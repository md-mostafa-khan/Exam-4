@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contacts</h1>

        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('contacts.index') }}" method="GET" class="form-inline">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Search by name or email" value="{{ request()->query('search') }}">
                    <button type="submit" class="btn btn-primary mr-2">Search</button>
                    
                    <!-- Sorting Dropdown -->
                    <select name="sort" class="form-control mr-2" onchange="this.form.submit()">
                        <option value="">Sort By</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                        <option value="created_at_asc" {{ request('sort') == 'created_at_asc' ? 'selected' : '' }}>Date (Oldest First)</option>
                        <option value="created_at_desc" {{ request('sort') == 'created_at_desc' ? 'selected' : '' }}>Date (Newest First)</option>
                    </select>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add New Contact</a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contacts->appends(request()->query())->links() }}
    </div>
@endsection
