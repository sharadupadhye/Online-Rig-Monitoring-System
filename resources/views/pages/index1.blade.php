<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
       /* ----------------------------------------------------------------- */
       /* General table container width */
.table-container1 {
    width: 50%;
    margin: 0 auto;
}

/* Ensure table takes full width on mobile devices */
@media (max-width: 768px) {
    .table-container1 {
        width: 100%;
    }

    /* Keep the same input field width (45%) and spacing (3%) for mobile */
    .col-6 {
        width: 45%; /* 45% width for input fields */
        padding-left: 3%; /* 3% spacing on the left */
        padding-right: 3%; /* 3% spacing on the right */
    }

    .small-input {
        width: 100%; /* Make sure input fields fill their 45% containers */
    }
}

/* Non-mobile specific spacing adjustments */
.custom-table th, .custom-table td {
    border: 3px solid #000; /* Increased border thickness and darkness for table cells */
    padding: 5px; /* Ensure enough padding in the table cells */
}

.form-control {
    height: 30px;
    padding: 1px 2px;
    font-size: 12px;
    border: 2px solid #000; /* Darker and thicker borders for input fields */
}

.form-group {
    margin-bottom: 5px; /* Ensure small but consistent spacing between form fields */
}

/* Remove extra margins between labels and inputs */
label {
    margin-bottom: 3px;
    font-size: 12px;
}

/* Ensure block and percentage fields have proper padding */
.row {
    margin-left: 0;
    margin-right: 0;
}

/* Each block and percentage input field should take 45% width with 3% spacing */
.col-6 {
    width: 45%; /* Input fields take 45% of the width */
    padding-left: 3%;
    padding-right: 3%;
}

/* Button container with consistent spacing */
.btn-container {
    margin-top: 20px;
    text-align: center;
}

       /* -------------------------------------------------------------------*/


    </style>
</head>
<body>
    <div class="container mt-5 table-container1">
        <h2 class="text-center">Test Plan</h2>

        <form >
            @csrf
            <table class="table table-bordered custom-table">
                <thead>
                    <tr>
                        <th>Shift Mode</th>
                        <th>Target</th>
                        <th>Block-1,2</th>
                        <th>Block-3,4</th>
                        <th>Completed Target</th>
                    </tr>
                </thead>
                <tbody id="dynamicTable">
                    <tr>
                        <!-- First Column (Shift Mode / RPM) -->
                        <td>
                            <div class="form-group">
                                <label>Shift Mode</label>
                                <select name="shift_mode[]" class="form-control">
                                    <option value="Day">Day Shift</option>
                                    <option value="Night">Night Shift</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>RPM</label>
                                <input type="number" name="rpm[]" class="form-control small-input" placeholder="RPM">
                            </div>
                        </td>

                        <!-- Second Column (Total Target / Block Target) -->
                        <td>
                            <div class="form-group">
                                <label>Total Target</label>
                                <input type="number" name="total_target[]" class="form-control small-input" placeholder="Target">
                            </div>
                            <div class="form-group mt-2">
                                <label>Block Target</label>
                                <input type="number" name="block_target[]" class="form-control small-input" placeholder="Block Target">
                            </div>
                        </td>

                        <!-- Third Column (Block-1 / Block-2) -->
                        <td>
                            <div class="form-group">
                                <label>Block-1</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="block_1[]" class="form-control small-input" placeholder="Block-1">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="block_1_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Block-2</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="block_2[]" class="form-control small-input" placeholder="Block-2">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="block_2_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Fourth Column (Block-3 / Block-4) -->
                        <td>
                            <div class="form-group">
                                <label>Block-3</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="block_3[]" class="form-control small-input" placeholder="Block-3">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="block_3_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Block-4</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="block_4[]" class="form-control small-input" placeholder="Block-4">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="block_4_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Fifth Column (Cycle Completed / Target Completed %) -->
                        <td>
                            <div class="form-group">
                                <label>Total Cycle</label>
                                <input type="number" name="total_cycle_completed[]" class="form-control small-input" placeholder="Completed">
                            </div>
                            <div class="form-group mt-2">
                                <label>Target %</label>
                                <input type="number" name="total_target_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="btn-container">
                <button type="button" class="btn btn-success addRow">Add Row</button>
                <button type="button" class="btn btn-danger removeRow">Remove Row</button>
            </div>
            <div class="btn-container mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            // Add new row
            $('.addRow').click(function () {
                var newRow = `
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Shift Mode</label>
                                <select name="shift_mode[]" class="form-control small-input">
                                    <option value="Day">Day Shift</option>
                                    <option value="Night">Night Shift</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>RPM</label>
                                <input type="number" name="rpm[]" class="form-control small-input" placeholder="RPM">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Total Target</label>
                                <input type="number" name="total_target[]" class="form-control small-input" placeholder="Target">
                            </div>
                            <div class="form-group mt-2">
                                <label>Block Target</label>
                                <input type="number" name="block_target[]" class="form-control small-input" placeholder="Block Target">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Block-1</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="block_1[]" class="form-control small-input" placeholder="Block-1">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="block_1_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Block-2</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="block_2[]" class="form-control small-input" placeholder="Block-2">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="block_2_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Block-3</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="block_3[]" class="form-control small-input" placeholder="Block-3">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="block_3_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Block-4</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="block_4[]" class="form-control small-input" placeholder="Block-4">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="block_4_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Cycle Completed</label>
                                <input type="number" name="total_cycle_completed[]" class="form-control small-input" placeholder="Completed">
                            </div>
                            <div class="form-group mt-2">
                                <label>Target Completed %</label>
                                <input type="number" name="total_target_percentage[]" class="form-control small-input" placeholder="%" min="0" max="100">
                            </div>
                        </td>
                    </tr>
                `;
                $('#dynamicTable').append(newRow);
            });

            // Remove row functionality
            $('.removeRow').click(function () {
                $('#dynamicTable tr:last').remove();
            });
        });
    </script>
</body>
</html>
