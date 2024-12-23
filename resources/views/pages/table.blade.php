<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Plans</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .table-wrapper {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f8f9fa;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table-wrapper h4 {
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Remove number input spinner */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
            appearance: textfield;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
@include('pages.loader')
@include('pages.dropdown')
@include('pages.offline')

<div class="container mt-5">
    <h2 class="mb-4">Test Plans</h2>
    <form method="POST" action="{{ route('test-plans.store') }}">
        @csrf
        <div id="tablesContainer">
            <!-- Initial Table -->
            <div class="table-responsive mt-3 table-wrapper" data-table-index="0">
                <h4>Test Plan 1</h4>
                <div class="form-group">
                    <label for="tableDetail1">Test Plan Details:</label>
                    <input type="text" class="form-control" name="table_details[]" id="tableDetail1" required>
                </div>
                
                <div class="form-group">
                    <label for="oilDetails1">Oil Details:</label>
                    <input type="text" class="form-control" name="oil_details[]" id="oilDetails1" required>
                </div>
               
                <table class="table dynamicTable">
                    <thead>
                        <tr>
                            <th>Shift Mode</th>
                            <th>RPM</th>
                            <th>Target</th>
                            <th>Block Target</th>
                            <th>Block 1</th>
                            <th>Block 2</th>
                            <th>Block 3</th>
                            <th>Block 4</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="shift_mode[0][]" required></td>
                            <td><input type="number" class="form-control" name="rpm[0][]" required></td>
                            <td><input type="number" class="form-control" name="target[0][]" required></td>
                            <td><input type="number" class="form-control" name="block_target[0][]" required></td>
                            <td><input type="number" class="form-control" name="block_1[0][]" required></td>
                            <td><input type="number" class="form-control" name="block_2[0][]" required></td>
                            <td><input type="number" class="form-control" name="block_3[0][]" required></td>
                            <td><input type="number" class="form-control" name="block_4[0][]" required></td>
                            <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary addRow">Add Row</button>
            </div>
        </div>
        <button type="button" id="addTable" class="btn btn-success mt-3">Add Test Plan</button>
        <button type="submit" class="btn btn-primary mt-3">Save Test Plans</button>
    </form>
</div>

<script>
$(document).ready(function() {
    let tableIndex = 0;

    // Add a new Test Plan
    $('#addTable').click(function() {
        tableIndex++;
        const newTable = `
            <div class="table-responsive mt-3 table-wrapper" data-table-index="${tableIndex}">
                <h4>Test Plan ${tableIndex + 1}</h4>
                <div class="form-group">
                    <label>Test Plan Details:</label>
                    <input type="text" class="form-control" name="table_details[]" required>
                </div>
                <div class="form-group">
                    <label>Test Plan Added/Edited By:</label>
                    <input type="text" class="form-control" name="added_by[]" required>
                </div>
                <div class="form-group">
                    <label>Oil Details:</label>
                    <input type="text" class="form-control" name="oil_details[]" required>
                </div>
                <div class="form-group">
                    <label>Created On:</label>
                    <input type="date" class="form-control" name="created_on[]" required>
                </div>
                <div class="form-group">
                    <label>Updated On:</label>
                    <input type="date" class="form-control" name="updated_on[]" required>
                </div>
                <table class="table dynamicTable">
                    <thead>
                        <tr>
                            <th>Shift Mode</th>
                            <th>RPM</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="shift_mode[${tableIndex}][]" required></td>
                            <td><input type="number" class="form-control" name="rpm[${tableIndex}][]" required></td>
                            <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary addRow">Add Row</button>
            </div>
        `;
        $('#tablesContainer').append(newTable);
    });

    // Remove a row
    $('#tablesContainer').on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
    });
});
</script>

</body>
</html>
