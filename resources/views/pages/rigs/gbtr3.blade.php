@extends('layouts.app')

@section('content')
@include('pages.loader')
@include('pages.dropdown')
@include('pages.offline')

<div class="container">
    <h3 class="mt-5 text-center">GBTR-3 Readings</h3>

    <!-- Search Form -->
    <div class="mb-3 text-center">
        <form method="GET" action="{{ route('employee.index') }}">
            <input type="text" name="search" placeholder="Search..." class="form-control w-50 d-inline" aria-label="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">STATUS1</th>
                    <th scope="col">MODE1</th>
                    <th scope="col">SAMPLE1</th>
                    <th scope="col">CYCLES1</th>
                    <th scope="col">RPM1</th>
                    <th scope="col">GBTEMP1</th>
                    <th scope="col">MBTEMP1</th>
                    <th scope="col">OBTEMP1</th>
                    <th scope="col">PRESSURE1</th>
                    <th scope="col">REMARK1</th>
                    <th scope="col">PERSON1</th>
                    <th scope="col" style="width: 200px;">DATE</th> <!-- Increased width -->
                    <th scope="col" style="width: 100px;">TIME</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($employees->isEmpty())
                    <tr>
                        <td colspan="15" class="text-danger">No readings available.</td>
                    </tr>
                @else
                    @foreach ($employees as $key => $employee)
                    <tr>
                        <td scope="row">{{ ++$key }}</td>
                        <td>{{ $employee->STATUS1 }}</td>
                        <td>{{ $employee->MODE1 }}</td>
                        <td>{{ $employee->SAMPLE1 }}</td>
                        <td>{{ $employee->CYCLES1 }}</td>
                        <td>{{ $employee->RPM1 }}</td>
                        <td>{{ $employee->GBTEMP1 }}</td>
                        <td>{{ $employee->MBTEMP1 }}</td>
                        <td>{{ $employee->OBTEMP1 }}</td>
                        <td>{{ $employee->PRESSURE1 }}</td>
                        <td>{{ $employee->REMARK1 }}</td>
                        <td>{{ $employee->PERSON1 }}</td>
                        <td>{{ $employee->created_at->format('d-m-Y') }}</td>
                        <td>{{ $employee->created_at->format('H:i') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('employee.edit', $employee->id) }}" aria-label="Edit">
                                    <button class="btn btn-primary btn-sm" title="Edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');" aria-label="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>

@endsection

@push('css')
<style>
    .form-area {
        font-family: 'Roboto', sans-serif !important;
        font-weight: 400 !important;
        font-size: 16px !important;
        padding: 20px;
        margin-top: 20px;
        background-color: #00ffc8;
    }

    table td {
        text-align: center; /* Center all table cell text */
    }
</style>
@endpush
