@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-8 p-8 bg-white rounded shadow">
        <h2 class="text-2xl font-semibold mb-6">Edit Employee</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name:</label>
                <input type="text" class="form-input mt-1 block w-full" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name:</label>
                <input type="text" class="form-input mt-1 block w-full" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required>
            </div>

            <div class="mb-4">
                <label for="company_id" class="block text-sm font-medium text-gray-700">Company:</label>
                <select class="form-select mt-1 block w-full" id="company_id" name="company_id" required>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" class="form-input mt-1 block w-full" id="email" name="email" value="{{ old('email', $employee->email) }}">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone:</label>
                <input type="text" class="form-input mt-1 block w-full" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
        <br/>
         <a href="{{ route('employees.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Employees</a>

    </div>
@endsection
