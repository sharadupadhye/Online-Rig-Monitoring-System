<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Row Table with Alignment</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts for Roboto font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  
  <style>
    /* Basic Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #f8f9fa;
      font-family: 'Roboto', sans-serif;
      font-size: 1rem;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin-top: 20px;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
      font-size: 24px;
    }

    /* Table Styling */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      display: block;
      overflow-x: auto;
    }

    table th,
    table td {
      padding: 10px;
      text-align: center;
      vertical-align: middle;
      font-size: 16px;
      border: 1px solid #ddd;
      min-width: 120px;
    }

    table th {
      background-color: #f4f4f9;
      color: #333;
    }

    tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tbody tr:hover {
      background-color: #f1f1f1;
    }

    /* Input and Select Alignment */
    table td input,
    table td select {
      width: 100%;
      padding: 5px;
      text-align: center;
      box-sizing: border-box;
    }

    /* Adjust the file input */
    table td input[type="file"] {
      width: 100%;
      padding: 5px;
      text-align: center;
      box-sizing: border-box;
      display: inline-block;
    }

    /* Button Styling */
    button {
      padding: 8px 12px;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s;
      margin: 2px 0;
    }

    .startButton {
      background-color: #4CAF50;
    }

    .startButton:hover {
      background-color: #45a049;
    }

    .stopButton {
      background-color: #f44336;
    }

    .stopButton:hover {
      background-color: #d32f2f;
    }

    .removeButton {
      background-color: #d32f2f;
    }

    .removeButton:hover {
      background-color: #c62828;
    }

    #addRowButton {
      background-color: #3f51b5;
      padding: 10px 20px;
      border-radius: 5px;
      color: white;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
      text-align: center;
      margin-top: 20px;
    }

    #addRowButton:hover {
      background-color: #303f9f;
    }

    input:focus {
      border: 2px solid #4CAF50;
      outline: none;
    }

    /* Responsive Design */
    @media screen and (max-width: 1024px) {
      table th, table td {
        font-size: 14px;
        padding: 8px;
      }
    }

    @media screen and (max-width: 768px) {
      table {
        font-size: 12px;
      }

      table th, table td {
        font-size: 12px;
        padding: 6px;
      }

      button {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Dynamic Data Entry Table</h1>

    <!-- Table with Headers -->
    <table id="dataTable">
      <thead>
        <tr>
          <th>Sr. No.</th>
          <th>Test ID</th>
          <th>Sample Name</th>
          <th>Test Rig</th>
          <th>Select Test Plan</th>
          <th>Start Date</th>
          <th>Completion Date</th>
          <th>Percentage</th>
          <th>Inspection Details</th>
          <th>Remark</th>
          <th>Report</th>
          <th>Start</th>
          <th>Stop</th>
          <th>Upload Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example Row -->
        <tr>
          <td><input type="text" value="1" disabled></td>
          <td><input type="text" value="T001" disabled></td>
          <td><input type="text" value="Sample A" disabled></td>
          <td>
            <select>
              <option value="Rig 1">Rig 1</option>
              <option value="Rig 2">Rig 2</option>
            </select>
          </td>
          <td>
            <select>
              <option value="Plan A">Plan A</option>
              <option value="Plan B">Plan B</option>
            </select>
          </td>
          <td><input type="date"></td>
          <td><input type="date"></td>
          <td><input type="number"></td>
          <td><input type="text"></td>
          <td><input type="text"></td>
          <td><button class="startButton">Generate Report</button></td>
          <td><button class="startButton">Start</button></td>
          <td><button class="stopButton">Stop</button></td>
          <td><input type="file" accept="image/*"></td>
          <td><button class="removeButton">Remove</button></td>
        </tr>
      </tbody>
    </table>

    <!-- Add New Row Button -->
    <button id="addRowButton">Add New Row</button>
  </div>

  <script>
  const addRowButton = document.getElementById("addRowButton");
  const dataTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];

  function createRow() {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td><input type="text" value="${dataTable.rows.length + 1}" disabled></td>
      <td><input type="text"></td>
      <td><input type="text"></td>
      <td>
        <select>
          <option value="Rig 1">Rig 1</option>
          <option value="Rig 2">Rig 2</option>
        </select>
      </td>
      <td>
        <select>
          <option value="Plan A">Plan A</option>
          <option value="Plan B">Plan B</option>
        </select>
      </td>
      <td><input type="date"></td>
      <td><input type="date"></td>
      <td><input type="number"></td>
      <td><input type="text"></td>
      <td><input type="text"></td>
      <td><button class="startButton">Generate Report</button></td>
      <td><button class="startButton">Start</button></td>
      <td><button class="stopButton">Stop</button></td>
      <td><input type="file" accept="image/*"></td>
      <td><button class="removeButton">Remove</button></td>
    `;
    dataTable.appendChild(row);

    // Add event listener for the remove button
    row.querySelector('.removeButton').addEventListener('click', () => row.remove());
  }

  addRowButton.addEventListener("click", createRow);
</script>

</body>
</html>
