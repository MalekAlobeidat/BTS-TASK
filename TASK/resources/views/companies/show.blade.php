@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Company Details</h2>

        <table class="min-w-full bg-white border border-gray-300 mb-4">
            <tr>
                <th class="py-2 px-4 border-b">Name:</th>
                <td class="py-2 px-4 border-b">{{ $company->name }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b">Email:</th>
                <td class="py-2 px-4 border-b">{{ $company->email }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b">Logo:</th>
                <td class="py-2 px-4 border-b">
                    @if($company->logo)
                        <img src="{{ asset('storage/logos/' . $company->logo) }}" alt="Company Logo" class="max-w-100 max-h-100">
                    @else
                        No Logo
                    @endif
                </td>
            </tr>
        </table>

        <a href="{{ route('companies.index') }}" class="btn btn-primary">Back to Companies</a>
        {{-- <br />
        <a href="{{ route('employees.index', $company->id) }}" class="btn btn-secondary">View Employees</a> --}}

    </div>
@endsection
