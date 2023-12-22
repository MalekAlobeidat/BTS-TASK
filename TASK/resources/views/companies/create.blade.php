@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Create Company</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                <input type="email" name="email" id="email" class="form-input mt-1 block w-full" value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label for="logo" class="block text-sm font-medium text-gray-600">Logo:</label>
                <input type="file" name="logo" id="logo" class="form-input mt-1 block w-full">
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Company
                </button>
            </div>
        </form>
        <br >
        <a href="{{ route('companies.index') }}" class="btn btn-primary">Back to Companies</a>

    </div>
@endsection
