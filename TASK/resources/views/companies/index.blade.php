@extends('layouts.app')

@section('content')
    
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Companies</h2>
        <div class="mb-4">
            <a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>
            <br/>
            <a href="{{ route('employees.index') }}" class="btn btn-success">View Employees</a>

        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Logo</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $company->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $company->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $company->email }}</td>
                        <td class="py-2 px-4 border-b">
                            @if($company->logo)
                                <img src="{{ asset('storage/logos/' . $company->logo) }}" alt="Company Logo" class="max-w-20 max-h-20">
                            @else
                                No Logo
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $companies->links() }}
    </div>
@endsection
