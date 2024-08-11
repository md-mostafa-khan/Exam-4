@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Contact</h2>

        <form class="p-3 mb-2 bg-light text-dark" action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" placeholder=" নির্ভুলভাবে আপনার নাম লিখুন " name="name" id="name" value="{{old('name')}}" class="form-control" required>
                <p>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" placeholder=" নির্ভুলভাবে আপনার ইমেইল লিখুন " name="email" id="email" value="{{old('email')}}" class="form-control" required>
                <p>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" placeholder=" নির্ভুলভাবে আপনার ফোন নাম্বার লিখুন " name="phone" id="phone" class="form-control" value="{{old('phone')}}" >
                <p>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" placeholder=" নির্ভুলভাবে আপনার ঠিকানা লিখুন " name="address" id="address" class="form-control" value="{{old('address')}}">
                <p>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </p>
            </div>
            <button type="submit" class="btn btn-primary">Save Contact</button>
        </form>
    </div>
@endsection
