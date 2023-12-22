@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Edit Company</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input type="text" class="form-input mt-1 block w-full" id="name" name="name" value="{{ old('name', $company->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                <input type="email" class="form-input mt-1 block w-full" id="email" name="email" value="{{ old('email', $company->email) }}">
            </div>

            <div class="mb-4">
                <label for="logo" class="block text-sm font-medium text-gray-600">Logo:</label>
                <input type="file" class="form-input mt-1 block w-full" id="logo" name="logo">
                @if($company->logo)
                    <img src="{{ asset('storage/logos/' . $company->logo) }}" alt="Company Logo" class="mt-2 max-w-100 max-h-100">
                @else
                    <span class="text-gray-500">No Logo</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('companies.index') }}" class="btn btn-primary">Back to Companies</a>

    </div>
@endsection
