<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Row Table</title>
  <style>
    /* Basic reset and styling */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: flex-start; /* Align content at the top */
      height: 100vh;
      padding: 20px; /* Adds padding to prevent content from sticking to the edges */
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin-top: 0; /* Remove unnecessary margin at the top */
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    /* Table Styling */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      display: block; /* Allows scrolling if the table overflows */
      overflow-x: auto; /* Horizontal scrolling */
    }

    table th,
    table td {
      padding: 8px; /* Reduced padding */
      text-align: center;
      font-size: 13px; /* Decreased font size for a compact table */
      min-width: 80px; /* Decreased min-width for columns */
      white-space: nowrap; /* Prevents text from wrapping */
      border: 1px solid #ddd; /* Keeps table borders */
    }

    table th {
      background-color: #f4f4f9;
      color: #333;
    }

    /* Add alternating row colors */
    tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tbody tr:hover {
      background-color: #f1f1f1;
    }

    /* Remove border from the input elements inside the cells */
    table td input {
      border: none;
      background-color: transparent; /* Keeps the input field transparent */
      outline: none; /* Removes the outline on focus */
      width: 100%; /* Makes input take up the full width of the cell */
      padding: 6px; /* Padding to give the input some space */
      font-size: 13px; /* Smaller font for inputs */
    }

    /* Specifically increase the font size for date inputs */
    table td input[type="date"] {
      font-size: 16px; /* Increased font size for date input */
    }

    /* Button Styling */
    button {
      padding: 10px 15px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      display: block;
      margin: 20px auto 0; /* Margin adjusted to position below table */
    }

    button:hover {
      background-color: #45a049;
    }

    .removeButton {
      background-color: #f44336;
      padding: 5px 10px;
      border: none;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }

    .removeButton:hover {
      background-color: #d32f2f;
    }

    /* Input Focus */
    input:focus {
      border: 2px solid #4CAF50;
      outline: none;
    }

    /* Responsive Design */
    @media screen and (max-width: 1024px) {
      table th, table td {
        font-size: 12px;
        padding: 6px; /* Reduced padding */
      }

      button {
        width: 100%;
        font-size: 14px;
      }
    }

    @media screen and (max-width: 768px) {
      table {
        font-size: 12px;
        display: block; /* Allow horizontal scrolling */
        overflow-x: auto;
      }

      table th, table td {
        font-size: 12px;
        padding: 5px; /* Even smaller padding for mobile */
      }

      button {
        width: 100%;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Data Entry Table</h1>
    
    <!-- Table with Headers -->
    <table id="dataTable">
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
        <!-- Rows will be added dynamically here -->
      </tbody>
    </table>

    <!-- Button to add a new row -->
    <button id="addRowButton">Add New Row</button>
  </div>

  <script>
    // Get references to the table and the "Add Row" button
    const addRowButton = document.getElementById("addRowButton");
    const dataTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];

    // Function to create a new row
    function createRow() {
      // Create a new row element
      const row = document.createElement("tr");

      // Define the columns we need
      const columns = [
        'date', 'sample', 'shiftMode', 'dailyCycles', 'blockCycles', 
        'cummCycles', 'dailyHrs', 'cummHrs', 'status', 'remark'
      ];

      // Loop over the columns to create the corresponding <td> elements
      columns.forEach(col => {
        const cell = document.createElement("td");

        if (col === 'date') {
          const input = document.createElement('input');
          input.type = 'date';
          cell.appendChild(input);
        } else {
          const input = document.createElement('input');
          input.type = 'text';
          // Removed placeholder
          cell.appendChild(input);
        }

        row.appendChild(cell);
      });

      // Create an Action Column with a remove button
      const actionCell = document.createElement("td");
      const removeButton = document.createElement("button");
      removeButton.innerText = "Remove";
      removeButton.classList.add("removeButton");
      removeButton.onclick = function() {
        dataTable.removeChild(row);
      };
      actionCell.appendChild(removeButton);
      row.appendChild(actionCell);

      // Add the new row to the table
      dataTable.appendChild(row);
    }

    // Event listener to add a new row when the button is clicked
    addRowButton.addEventListener("click", createRow);
  </script>
</body>
</html>
