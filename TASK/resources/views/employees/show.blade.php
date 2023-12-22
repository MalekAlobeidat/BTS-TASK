@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Employee Details</h2>

        <table class="min-w-full bg-white border border-gray-300">
            <tr>
                <th class="py-2 px-4 border-b">First Name:</th>
                <td class="py-2 px-4 border-b">{{ $employee->first_name }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b">Last Name:</th>
                <td class="py-2 px-4 border-b">{{ $employee->last_name }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b">Company:</th>
                <td class="py-2 px-4 border-b">{{ $employee->company->name }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b">Email:</th>
                <td class="py-2 px-4 border-b">{{ $employee->email }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b">Phone:</th>
                <td class="py-2 px-4 border-b">{{ $employee->phone }}</td>
            </tr>
        </table>
        <br/>
        <a href="{{ route('employees.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Employees</a>
    </div>
@endsection
