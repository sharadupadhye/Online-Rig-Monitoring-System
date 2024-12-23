<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Test Plan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom Styles */
        <style>
    /* General Styles */
    body {
        background-color: #f8fafc;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 1000px;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background: linear-gradient(135deg, #4f46e5, #6b7280);
        color: #ffffff;
        font-size: 1.2rem;
        font-weight: bold;
        border-radius: 12px 12px 0 0;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .form-label {
        font-weight: 500;
    }

    /* Table Styles */
    .table th,
    .table td {
        text-align: center; /* Center text horizontally */
        vertical-align: middle; /* Center text vertically */
    }

    .form-control {
        text-align: center; /* Center text in input fields */
    }

    /* Remove Spinner/Arrows from Number Inputs */
    input[type='number'] {
        -moz-appearance: textfield; /* Firefox */
        -webkit-appearance: none; /* Chrome, Safari, Edge */
        appearance: none; /* Standard syntax */
        margin: 0;
    }

    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .btn-primary {
        background-color: #4f46e5;
        border: none;
    }

    .btn-primary:hover {
        background-color: #4338ca;
    }

    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
        }

        .form-control {
            font-size: 0.9rem;
        }

        .btn {
            font-size: 0.9rem;
        }
    }
</style>

    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                Edit Test Plan
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('testplans.update', $testPlan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- TestPlan Details Section -->
                    <div class="mb-4">
                        <h5 class="fw-bold">Test Plan Details</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="details" class="form-label">Details</label>
                                <input type="text" class="form-control" id="details" name="details" value="{{ old('details', $testPlan->details) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="remark" class="form-label">Remark</label>
                                <input type="text" class="form-control" id="remark" name="remark" value="{{ old('remark', $testPlan->remark) }}">
                            </div>
                        </div>
                    </div>

                    <!-- TestPlan Rows Section -->
                    <h5 class="fw-bold mt-4">Test Plan Rows</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Shift Mode</th>
                                    <th>RPM</th>
                                    <th>Target</th>
                                    <th>Block Target</th>
                                    <th>Block 1</th>
                                    <th>Block 2</th>
                                    <th>Block 3</th>
                                    <th>Block 4</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testPlan->rows as $row)
                                    <tr>
                                        <input type="hidden" name="rows[{{ $row->id }}][id]" value="{{ $row->id }}">
                                        <td><input type="text" name="rows[{{ $row->id }}][shift_mode]" value="{{ old('rows.' . $row->id . '.shift_mode', $row->shift_mode) }}" class="form-control"></td>
                                        <td><input type="number" name="rows[{{ $row->id }}][rpm]" value="{{ old('rows.' . $row->id . '.rpm', $row->rpm) }}" class="form-control"></td>
                                        <td><input type="number" name="rows[{{ $row->id }}][target]" value="{{ old('rows.' . $row->id . '.target', $row->target) }}" class="form-control"></td>
                                        <td><input type="number" name="rows[{{ $row->id }}][block_target]" value="{{ old('rows.' . $row->id . '.block_target', $row->block_target) }}" class="form-control"></td>
                                        <td><input type="number" name="rows[{{ $row->id }}][block_1]" value="{{ old('rows.' . $row->id . '.block_1', $row->block_1) }}" class="form-control"></td>
                                        <td><input type="number" name="rows[{{ $row->id }}][block_2]" value="{{ old('rows.' . $row->id . '.block_2', $row->block_2) }}" class="form-control"></td>
                                        <td><input type="number" name="rows[{{ $row->id }}][block_3]" value="{{ old('rows.' . $row->id . '.block_3', $row->block_3) }}" class="form-control"></td>
                                        <td><input type="number" name="rows[{{ $row->id }}][block_4]" value="{{ old('rows.' . $row->id . '.block_4', $row->block_4) }}" class="form-control"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Buttons -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Update</button>
                        <a href="{{ route('test-plans.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
