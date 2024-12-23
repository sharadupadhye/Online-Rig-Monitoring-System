<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Rig Table</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
            font-size: 1.1rem; /* Increased font size */
        }

        h2 {
            color: #343a40;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .status-running { background-color: green; color: white; }
        .status-setup { background-color: yellow; }
        .status-breakdown { background-color: orange; }
        .status-ideal { background-color: red; color: white; }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            font-size: 1rem;
            border: 1px solid #adb5bd;
            color: #212529;
            font-weight: 400;
        }

        .table th {
            border-bottom: 2px solid #343a40;
            background-color: #e9ecef;
            color: #343a40;
            font-weight: 700;
        }

        .dropdown {
            margin-right: 15px;
        }

        .container {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            margin-top: 30px;
            overflow: hidden;
        }

        .updated-info {
            font-weight: bold;
            color: #007bff;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .notification {
            display: none;
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            z-index: 1000;
        }

        /* Responsive styling */
        @media (max-width: 767px) {
            .table th, .table td {
                font-size: 0.9rem;
            }

            .dropdown {
                font-size: 0.9rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .container {
                padding: 15px;
            }
        }

        /* Responsive table */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

    </style>
</head>
<body>
@include('pages.loader')
@include('pages.dropdown')
@include('pages.offline')

<!-- Notification Banner -->
<div id="updateNotification" class="notification">Data Updated!</div>

<div class="container">
    <h2 class="text-center">Dynamic Rig Table</h2>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <strong>Updated By:</strong>
            <select id="updatedBySelect" onchange="updateTimestamp()" class="dropdown" aria-label="Select person who updated the data">
                <option value="Sharad">Sharad</option>
                <option value="Amol">Amol</option>
                <option value="Vinod">Vinod</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div>
            <strong class="updated-info">Updated At:</strong> <span id="updatedAt"></span>
        </div>
    </div>

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Rig No</th>
                    <th>Rig Name</th>
                    <th>Test Item</th>
                    <th>Test Progress</th>
                    <th>Cumm Cycles</th>
                    <th>Daily Hrs</th>
                    <th>Weekly Hrs</th>
                    <th>Present Status</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody id="rigTableBody">
                @php
                    $rigNames = [
                        "SYNCHROCONE TEST RIG I", "SYNCHROCONE TEST RIG II", "SYNCHROCONE TEST RIG III", "SYNCHROCONE TEST RIG IV", "SYNCHROCONE TEST RIG V",
                        "SYNCHROCONE TEST RIG VI", "CVT -I", "CVT -II", "RUNNING IN I", "RUNNING IN II",
                        "RUNNING IN III", "RUNNING IN IV", "GEAR BOX TEST RIG - I", "GEAR BOX TEST RIG - V", "RATR-IV",
                        "GEAR BOX TEST RIG - III", "GEAR BOX TEST RIG - VI", "SPARE-1", "SPARE-2", "SPARE-3",
                        "SPARE-4", "SPARE-5", "SPARE-6", "SPARE-7", "SPARE-8", "SPARE-9"
                    ];
                @endphp

                @for ($i = 1; $i <= 25; $i++)
                    <tr id="rigRow{{$i}}">
                        <td>{{ $i }}</td>
                        <td><a href="{{ route('page' . $i) }}" aria-label="View details for {{ $rigNames[$i - 1] }}">{{ $rigNames[$i - 1] }}</a></td>
                        <td contenteditable="true" oninput="updateTimestamp()">Test {{ $i }}</td>
                        <td contenteditable="true" oninput="updateTimestamp()">In Progress</td>
                        <td contenteditable="true" oninput="updateTimestamp()">10</td>
                        <td contenteditable="true" oninput="updateTimestamp()">2</td>
                        <td contenteditable="true" oninput="updateTimestamp()">12</td>
                        <td>
                            <select class="form-control status-select" onchange="updateRowStatus(this); updateTimestamp()" aria-label="Select status for rig {{ $i }}">
                                <option value="">Select Status</option>
                                <option value="running">Running</option>
                                <option value="setup">Setup in Progress</option>
                                <option value="breakdown">Breakdown</option>
                                <option value="ideal">Ideal</option>
                            </select>
                        </td>
                        <td contenteditable="true" oninput="updateTimestamp()"></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>

<script>
    // Function to update the row's background color based on selected status
    function updateRowStatus(selectElement) {
        const row = selectElement.closest('tr');
        row.classList.remove('status-running', 'status-setup', 'status-breakdown', 'status-ideal');

        const status = selectElement.value;
        if (status === 'running') {
            row.classList.add('status-running');
        } else if (status === 'setup') {
            row.classList.add('status-setup');
        } else if (status === 'breakdown') {
            row.classList.add('status-breakdown');
        } else if (status === 'ideal') {
            row.classList.add('status-ideal');
        }

        // Trigger the update notification
        showUpdateNotification();
    }

    // Function to update the timestamp when a change occurs
    function updateTimestamp() {
        const now = new Date().toLocaleString();
        document.getElementById('updatedAt').innerText = now;

        // Trigger the update notification
        showUpdateNotification();
    }

    // Function to show a notification when data is updated
    function showUpdateNotification() {
        const notification = document.getElementById('updateNotification');
        notification.style.display = 'block';

        // Hide the notification after 3 seconds
        setTimeout(() => {
            notification.style.display = 'none';
        }, 3000);
    }

    // Initialize the timestamp on page load
    window.onload = function() {
        updateTimestamp();
    };
</script>

</body>
</html>
