<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Test Plans</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px;
    }

    h2 {
        color: #343a40;
        text-align: center;
        margin-top: 30px; /* Added more top margin */
        margin-bottom: 20px;
    }

    .add-test-plan-btn {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .add-test-plan-btn .btn {
        font-size: 16px;
        padding: 8px 20px;
        background-color: #28a745;
        border: none;
    }

    .add-test-plan-btn .btn:hover {
        background-color: #218838;
    }

    .table-wrapper {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .table-wrapper h4 {
        color: #007bff;
        text-align: center;
        margin-bottom: 20px;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table th {
        background-color: #007bff;
        color: #fff;
    }

    .edit-test-plan-btn {
        margin-top: 15px; /* Added space above the Edit button */
    }
</style>

<body>
    @include('pages.loader')
    @include('pages.dropdown')
    @include('pages.offline')
    <div class="container">
        <h2>Test Plans</h2>

        <!-- Add New Test Plan Button -->
        <div class="add-test-plan-btn">
            <a href="{{ route('table') }}" class="btn btn-success">Add New Test Plan</a>
        </div>

        @foreach($testPlans as $index => $testPlan)
            <div class="table-wrapper">
                <h4>Test Plan {{ $index + 1 }}</h4>
                <p><strong>Details:</strong> {{ $testPlan->details }}</p>
                <p><strong>Remark:</strong> {{ $testPlan->remark }}</p>
                <div class="table-responsive">
                    <table class="table table-bordered">
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
                            @foreach($testPlan->rows as $row)
                                <tr>
                                    <td>{{ $row->shift_mode }}</td>
                                    <td>{{ $row->rpm }}</td>
                                    <td>{{ $row->target }}</td>
                                    <td>{{ $row->block_target }}</td>
                                    <td>{{ $row->block_1 }}</td>
                                    <td>{{ $row->block_2 }}</td>
                                    <td>{{ $row->block_3 }}</td>
                                    <td>{{ $row->block_4 }}</td>
                                    <td>
                                        <form action="{{ route('test-plan-rows.destroy', $row->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Edit Button for Entire Test Plan -->
                <div class="edit-test-plan-btn">
                    <a href="{{ route('test-plans.edit', $testPlan->id) }}" class="btn btn-primary btn-sm">Edit Test Plan</a>
                </div>

                <!-- Delete Button for Entire Test Plan -->
                <form action="{{ route('test-plans.destroy', $testPlan->id) }}" method="POST" style="margin-top: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete Test Plan</button>
                </form>
            </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>
