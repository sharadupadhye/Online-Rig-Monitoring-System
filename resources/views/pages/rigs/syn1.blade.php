@include('pages.loader')
@include('pages.dropdown')
@include('pages.offline')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        /* Full-width Navbar with Two Equal Tabs */
        /* Navbar Styling */
        .myproject-navbar {
            width: 100%;
            background-color: #636668;
            border: 3px solid #4e4e4e;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .myproject-navbar .nav-link {
            color: white !important;
            font-size: 20px;
            width: 100%;
            text-align: center;
            padding: 5px 0;
        }

        .myproject-navbar .nav-link.active {
            background-color: #ccc !important;
            color: #333 !important;
        }

        .myproject-navbar .nav-tabs {
            border-bottom: none;
            width: 100%;
            display: flex;
        }

        .myproject-navbar .nav-item {
            width: 50%;
            display: flex;
        }

        /* Table Styling */
        .table-container {
            overflow-x: auto;
            width: 100%;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container table th,
        .table-container table td {
            padding: 12px;
            text-align: center;
            word-wrap: break-word;
            white-space: nowrap;
            box-sizing: border-box;
        }

        .btn-group .btn:hover {
            opacity: 0.8;
        }

        .custom-spacing {
            margin-right: 10px;
        }

        .curvy-btn {
            border-radius: 15px;
        }

        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .table-container table {
                width: 100%;
                overflow-x: auto;
                display: block;
            }
        }

        @media (max-width: 768px) {
            .table-container table th,
            .table-container table td {
                padding: 8px;
            }
        }
    </style>
</head>

<body>

<div class="myproject-navbar">
    <ul class="nav nav-tabs justify-content-between w-100" id="myTab" role="tablist">
        <li class="nav-item" role="presentation" style="width: 50%;">
            <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">READINGS</a>
        </li>
        <li class="nav-item" role="presentation" style="width: 50%;">
            <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">DAILY STATUS</a>
        </li>
    </ul>
</div>

<!-- Tab Content -->
<div class="tab-content mt-4" id="myTabContent">
    <!-- Tab 1 Content (Readings) -->
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="tab1">
        <div class="container">
            <h3 class="mt-5 text-center">SYNCHROCONE TEST RIG I Readings</h3>

            <!-- Search Form -->
            <div class="mb-3 text-center">
                <form method="GET" action="{{ route('employee.index') }}" id="searchForm">
                    <div class="d-flex justify-content-center">
                        <input type="text" name="search" placeholder="Search by Status..." class="form-control w-50 d-inline" aria-label="Search">
                        <select name="filter" class="form-control w-25 d-inline ms-2" aria-label="Filter">
                            <option value="all">All</option>
                            <option value="status1">Status 1</option>
                            <option value="status2">Status 2</option>
                        </select>
                        <button type="submit" class="btn btn-primary ms-2">Search</button>
                    </div>
                </form>
            </div>

            <!-- Table Container -->
            <div class="table-container">
                <table class="table table-bordered table-striped text-center" id="readingsTable">
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
                            <th scope="col" style="width: 150px;">DATE</th>
                            <th scope="col" style="width: 100px;">TIME</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $key => $employee)
                            <tr data-id="{{ $employee->id }}">
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
                                <td>{{ $employee->created_at->timezone('Asia/Kolkata')->format('d-m-Y') }}</td>
                                <td>{{ $employee->created_at->timezone('Asia/Kolkata')->format('H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('employee.edit', $employee->id) }}" aria-label="Edit">
                                       
                                            <button class="btn btn-primary btn-sm custom-spacing" title="Edit">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </button>
                                        </a>
                                        <button class="btn btn-danger btn-sm custom-spacing delete-btn" title="Delete" data-id="{{ $employee->id }}">
                                            Delete
                                        </button>
                                        <button class="btn btn-success btn-sm custom-spacing delete-btn" title="Insert Before" data-id="{{ $employee->id }}">
                                            Insert Before
                                        </button>
                                        <button class="btn btn-warning btn-sm custom-spacing delete-btn" title="Insert After" data-id="{{ $employee->id }}">
                                            Insert After
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tab 2 Content (Daily Status) -->
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="tab2">
        <div class="container">
            <h3 class="mt-5 text-center">Tab 2 Dynamic Table</h3>
            <table id="dynamicTable" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Sample</th>
                        <th>Shift Mode</th>
                        <th>Daily Cycles</th>
                        <th>Block Cycles</th>
                        <th>Cumm. Cycles</th>
                        <th>Daily Hrs</th>
                        <th>Cumm. Hrs</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamic rows will be added here by JavaScript -->
                </tbody>
            </table>
            <button id="addRowBtn" class="btn btn-success">Add New Row</button>
        </div>
    </div>
</div>

<!-- Modal for Editing -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for editing -->
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Event listener for delete buttons (AJAX for deletion)
        const deleteBtns = document.querySelectorAll('.delete-btn');
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const employeeId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this record?')) {
                    // Perform AJAX deletion
                    fetch(`/employee/${employeeId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF token for protection
                        },
                    }).then(response => {
                        if (response.ok) {
                            // Remove the row from the table
                            this.closest('tr').remove();
                            alert('Record deleted successfully.');
                        } else {
                            alert('Failed to delete record.');
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                        alert('There was an error deleting the record.');
                    });
                }
            });
        });
    });
</script>

</body>

</html>
