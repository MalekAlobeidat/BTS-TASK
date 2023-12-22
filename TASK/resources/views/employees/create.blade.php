@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Create Employee</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
                <input type="text" class="w-full border border-gray-300 p-2" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                <input type="text" class="w-full border border-gray-300 p-2" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            </div>

            <div class="mb-4">
                <label for="company_id" class="block text-gray-700 text-sm font-bold mb-2">Company:</label>
                <select class="w-full border border-gray-300 p-2" id="company_id" name="company_id" required>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" class="w-full border border-gray-300 p-2" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                <input type="text" class="w-full border border-gray-300 p-2" id="phone" name="phone" value="{{ old('phone') }}">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
        </form>
        <br />
        <a href="{{ route('employees.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Employees</a>

    </div>
@endsection
