<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Row Table</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts for Reborto font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  
  <style>
    /* Basic reset and styling */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
/* 
    body {
      font-family: 'Roboto', sans-serif; 
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      height: 100vh;
      padding: 20px;
    } */
    body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
            font-size: 1.1rem; /* Increased font size */
        }

    .container {
      width: 100%;
      max-width: 1200px;
      margin-top: 0;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
      font-size: 22px;
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
      padding: 12px;
      text-align: center;
      font-size: 18px; /* Set text size to 18px */
      min-width: 120px;
      white-space: nowrap;
      border: 1px solid #ddd;
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

    /* Input Styling */
    table td input,
    table td select,
    table td button {
      border: none;
      background-color: transparent;
      outline: none;
      width: 100%;
      padding: 6px;
      font-size: 16px; /* Increased font size for inputs */
    }

    /* Button Styling */
    button {
      padding: 10px 20px;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px; /* Set font size to 18px */
      transition: background-color 0.3s;
      width: 100%;
      margin: 5px 0;
    }

    /* Start Button (Green) */
    .startButton {
      background-color: #4CAF50;
    }

    .startButton:hover {
      background-color: #45a049;
    }

    /* Stop Button (Red) */
    .stopButton {
      background-color: #f44336;
    }

    .stopButton:hover {
      background-color: #d32f2f;
    }

    /* Pause Button (Orange) */
    .pauseButton {
      background-color: #ff9800;
    }

    .pauseButton:hover {
      background-color: #fb8c00;
    }

    /* Remove Button (Dark Red) */
    .removeButton {
      background-color: #d32f2f;
      padding: 10px 20px;
    }

    .removeButton:hover {
      background-color: #c62828;
    }

    /* Add New Row Button */
    #addRowButton {
      background-color: #3f51b5; /* Dark Blue */
      margin-top: 20px;
      padding: 10px 20px;
      border-radius: 5px;
      color: white;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
      text-align: center;
    }

    #addRowButton:hover {
      background-color: #303f9f; /* Darker Blue */
    }

    input:focus {
      border: 2px solid #4CAF50;
      outline: none;
    }

    /* Responsive Design */
    @media screen and (max-width: 1024px) {
      table th, table td {
        font-size: 16px;
        padding: 10px;
      }

      button {
        width: 100%;
        font-size: 16px;
      }
    }

    @media screen and (max-width: 768px) {
      table {
        font-size: 14px;
        display: block;
        overflow-x: auto;
      }

      table th, table td {
        font-size: 14px;
        padding: 8px;
      }

      button {
        width: 100%;
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
@include('pages.loader')
@include('pages.dropdown')
@include('pages.offline')
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
          <th>Completion/Resume Date</th>
          <th>Percentage</th>
          <th>Inspection Details</th>
          <th>Remark</th>
          <th>Report</th>
          <th>Start</th>
          <th>Stop</th>
          <th>Pause</th>
          <th>Upload Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example of Dummy Data Rows -->
        <tr>
          <td><input type="text" value="1" disabled></td>
          <td><input type="text" value="T001" disabled></td>
          <td><input type="text" value="Sample A" disabled></td>
        
          <td><select><option value="Rig 1">Rig 1</option><option value="Plan B">Rig 2</option></select></td>
          <td><select><option value="Plan A">Plan A</option><option value="Plan B">Plan B</option></select></td>
          <td><input type="date" value="2024-11-01" disabled></td>
          <td><input type="date" value="2024-11-05" disabled></td>
          <td><input type="number" value="85" disabled></td>
          <td><input type="text" value="Passed all tests" disabled></td>
          <td><input type="text" value="No issues" disabled></td>
          <td><button class="startButton">Generate Report</button></td>
          <td><button class="startButton">Start</button></td>
          <td><button class="stopButton">Stop</button></td>
          <td><button class="pauseButton">Pause</button></td>
          <td><input type="file" accept="image/*"></td>
          <td><button class="removeButton">Remove</button></td>
        </tr>
        <tr>
          <td><input type="text" value="2" disabled></td>
          <td><input type="text" value="T002" disabled></td>
          <td><input type="text" value="Sample B" disabled></td>
          <td><select><option value="Rig 2">Rig 1</option><option value="Plan B">Rig 2</option></select></td>
          <td><select><option value="Plan A">Plan A</option><option value="Plan B">Plan B</option></select></td>
          <td><input type="date" value="2024-11-02" disabled></td>
          <td><input type="date" value="2024-11-06" disabled></td>
          <td><input type="number" value="92" disabled></td>
          <td><input type="text" value="Inspection passed, minor adjustments needed" disabled></td>
          <td><input type="text" value="Excellent condition" disabled></td>
          <td><button class="startButton">Generate Report</button></td>
          <td><button class="startButton">Start</button></td>
          <td><button class="stopButton">Stop</button></td>
          <td><button class="pauseButton">Pause</button></td>
          <td><input type="file" accept="image/*"></td>
          <td><button class="removeButton">Remove</button></td>
        </tr>
        <tr>
          <td><input type="text" value="3" disabled></td>
          <td><input type="text" value="T003" disabled></td>
          <td><input type="text" value="Sample C" disabled></td>
          <td><select><option value="Rig 3">Rig 1</option><option value="Plan B">Rig 2</option></select></td>
          <td><select><option value="Plan C">Plan C</option><option value="Plan D">Plan D</option></select></td>
          <td><input type="date" value="2024-11-03" disabled></td>
          <td><input type="date" value="2024-11-07" disabled></td>
          <td><input type="number" value="90" disabled></td>
          <td><input type="text" value="Test completed, pending analysis" disabled></td>
          <td><input type="text" value="No issues detected" disabled></td>
          <td><button class="startButton">Generate Report</button></td>
          <td><button class="startButton">Start</button></td>
          <td><button class="stopButton">Stop</button></td>
          <td><button class="pauseButton">Pause</button></td>
          <td><input type="file" accept="image/*"></td>
          <td><button class="removeButton">Remove</button></td>
        </tr>
      </tbody>
    </table>

    <!-- Button to add a new row -->
    <button id="addRowButton">Start New Test</button>
  </div>

  <script>
    const addRowButton = document.getElementById("addRowButton");
    const dataTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];

    function createRow() {
      const row = document.createElement("tr");

      const columns = [
        { type: 'text', placeholder: 'Sr. No.' },
        { type: 'text', placeholder: 'Test ID' },
        { type: 'text', placeholder: 'Sample Name' },
        { type: 'text', placeholder: 'Test Rig' },
        { type: 'select', options: ['Plan A', 'Plan B', 'Plan C'] },
        { type: 'date', placeholder: 'Start Date' },
        { type: 'date', placeholder: 'Completion Date' },
        { type: 'number', placeholder: 'Percentage' },
        { type: 'text', placeholder: 'Inspection Details' },
        { type: 'text', placeholder: 'Remark' }
      ];

      columns.forEach(col => {
        const cell = document.createElement("td");
        if (col.type === 'select') {
          const select = document.createElement('select');
          col.options.forEach(optionText => {
            const option = document.createElement('option');
            option.textContent = optionText;
            select.appendChild(option);
          });
          cell.appendChild(select);
        } else {
          const input = document.createElement('input');
          input.type = col.type;
          input.placeholder = col.placeholder;
          cell.appendChild(input);
        }
        row.appendChild(cell);
      });

      // Action buttons and remove button
      const actionCell = document.createElement("td");
      actionCell.innerHTML = `
        <button class="startButton">Start</button>
        <button class="stopButton">Stop</button>
        <button class="pauseButton">Pause</button>
        <input type="file" accept="image/*">
      `;

      const removeButtonCell = document.createElement("td");
      const removeButton = document.createElement("button");
      removeButton.innerText = "Remove";
      removeButton.classList.add("removeButton");
      removeButton.onclick = function() {
        dataTable.removeChild(row);
      };

      removeButtonCell.appendChild(removeButton);
      row.appendChild(actionCell);
      row.appendChild(removeButtonCell);

      dataTable.appendChild(row);
    }

    addRowButton.addEventListener("click", createRow);
  </script>
</body>
</html>
