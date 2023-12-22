@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Employees</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-4">
            <a href="{{ route('employees.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create New Employee</a>
            <a href="{{ route('companies.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-4">Back to Companies</a>
            <form action="{{ route('employees.index') }}" method="GET" class="inline-block ml-4">
                <label for="company_filter" class="mr-2">Filter by Company:</label>
                <select name="company_filter" id="company_filter" onchange="this.form.submit()">
                    <option value="" {{ old('company_filter') === null ? 'selected' : '' }}>All Companies</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ request('company_filter') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </form>
            
        </div>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">First Name</th>
                    <th class="py-2 px-4 border-b">Last Name</th>
                    <th class="py-2 px-4 border-b">Company</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Phone</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $employee->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $employee->first_name }}</td>
                        <td class="py-2 px-4 border-b">{{ $employee->last_name }}</td>
                        <td class="py-2 px-4 border-b">{{ $employee->company->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $employee->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $employee->phone }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('employees.show', $employee->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">View</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $employees->links() }}
    </div>
@endsection
