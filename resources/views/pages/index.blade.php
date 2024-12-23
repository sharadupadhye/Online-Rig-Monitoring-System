<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Form Example</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
          @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        #dynamic-form {
            font-family: 'Roboto', sans-serif !important; 
            font-weight: 400 !important; 
            font-size: 16px !important;
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 5px;
            max-width: 800px;
            margin: 0 auto;
        }
        #dynamic-form .input-group {
            display: none;
            transition: all 0.3s ease;
        }
        #dynamic-form .arrow-buttons {
            margin-left: 5px;
            border: none;
            background-color: #343a40;
            color: white;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        #dynamic-form .arrow-buttons:hover {
            background-color: #495057;
        }
        #dynamic-form .selected-options {
            font-family: 'Roboto', sans-serif !important; 
          
            margin: 20px 0;
            font-weight: bold;
            text-align: left; /* Align text to the left */
            font-size: 1.2rem;
            color: #333;
        }
        #dynamic-form .success-message {
            font-family: 'Roboto', sans-serif !important; 
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
        #dynamic-form legend {
            font-family: 'Roboto', sans-serif !important; 
            text-align: center;
            width: auto;
            font-weight: bold;
        }
        #dynamic-form .dropdown-custom, #dynamic-form .input-custom {
            width: 300px;
        }
        @media (max-width: 576px) {
            #dynamic-form .arrow-buttons {
                margin-left: 10px;
                margin-top: 5px;
            }
            #dynamic-form .dropdown-custom, #dynamic-form .input-custom {
                margin-bottom: 10px;
            }
        }
        .highlight {
    font-family: 'Roboto', sans-serif; /* Using a beautiful font */
    background-color: #d3d3d3; /* Grey background for highlighted text */
    font-weight: bold; /* Makes the text bold */
    padding: 5px 10px; /* Adds some padding */
    border-radius: 5px; /* Rounds the corners */
    position: relative; /* Positioning for pseudo-elements */
    display: inline-block; /* Ensures padding is applied correctly */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Adds shadow for depth */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition for hover effects */
}

.highlight:hover {
    background-color: #c0c0c0; /* Darker grey on hover */
    transform: scale(1.05); /* Slightly enlarges on hover */
}

.highlight::before {
    content: ''; /* Adds a decorative element before the text */
    position: absolute;
    top: 0;
    left: -10px; /* Adjusts the position */
    width: 15px; /* Width of the graphic */
    height: 100%; /* Full height of the text */
    background-color: #ffa500; /* Orange background for the graphic */
    border-radius: 5px; /* Rounds the corners */
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2); /* Shadow for the graphic */
}
#end {
    display: none; /* Hides the span completely */
}
    </style>
</head>


<body class="bg-light">

@include('pages.loader')
@include('pages.dropdown')
@include('pages.offline')
    <div class="container mt-5" id="dynamic-form">
        <!-- <form action="#" method="post" onsubmit="showSuccessMessage(event)"> -->
        <!-- <form method="POST" action="https://still-drake-hopelessly.ngrok-free.app/employee"> -->
        <form method="POST" action="{{ route('employee.store') }}">
        @csrf
            <fieldset class="border p-4 mb-4">
                <legend> Please Select The RIG </legend>
                <div class="form-group row">
                    <label for="options1" class="col-sm-4 col-form-label">Rig Type:</label>
                    <div class="col-sm-5">
                        <select id="options1" name="options1" class="form-control dropdown-custom" onchange="updateSecondDropdown(); showFields()">
                            <option value="">--Select Rig Type--</option>
                            <option value="option1">Synchronization</option>
                            <option value="option2">Running-In</option>
                            <option value="option3">Endurance</option>
                            <option value="option4">Special</option>
                        </select>
                    </div>
                    <div class="col-sm-3 d-flex align-items-center">
                        <button type="button" class="arrow-buttons" onclick="cycleOptions('options1', 1)">&#8658;&#8658;</button>
                        <button type="button" class="arrow-buttons" onclick="cycleOptions('options1', -1)">&#8656;&#8656;</button>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="options2" class="col-sm-4 col-form-label">Select Rig:</label>
                    <div class="col-sm-5">
                        <select id="options2" name="options2" class="form-control dropdown-custom" onchange="showFields()" required>
                            <option value="">--Select an option--</option>
                        </select>
                    </div>
                    <div class="col-sm-3 d-flex align-items-center">
                        <button type="button" class="arrow-buttons" onclick="cycleOptions('options2', 1)">&#8658;&#8658;</button>
                        <button type="button" class="arrow-buttons" onclick="cycleOptions('options2', -1)">&#8656;&#8656;</button>
                    </div>
                </div>
            </fieldset>

            <fieldset class="border p-4 mb-4">
                <legend>Please Enter The Readings</legend>

                <div class="selected-options" id="selectedOptions">
                    <div class="row">
                        <div class="col-sm-4 ">Selected Rig:</div>
                        <div class="col-sm-8">
                            <span id="selectedOption2" class="ml-3 highlight">None</span>
                        </div>
                    </div>
                </div>
    <!-- ======================================================================================================================== -->
    <div id="group1" class="input-group">
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">Status:</label>
            <div class="col-sm-8">
                <select id="STATUS1" name="STATUS1" class="form-control input-custom">
                <option value="">--Select Status--</option>
                    <option value="Start">Start</option>
                    <option value="Runnning">Runnning</option>
                    <option value="Stop">Stop</option>
                    <option value="Set Up In Progress">Set Up In Progress</option>
                    <option value="Breakdown">Breakdown</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Ideal">Ideal</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">Shift mode:</label>
            <div class="col-sm-8">
                <select id="MODE1" name="MODE1" class="form-control input-custom" >
                <option value="">--Select Shift Mode--</option>
                    <option value="1-N-1">1-N-1</option>
                    <option value="1-2-1">1-2-1</option>
                    <option value="2-3-2">2-3-2</option>
                    <option value="3-4-3">3-4-3</option>
                    <option value="4-5-4">4-5-4</option>
                    <option value="5-6-5">5-6-5</option>
                    <option value="6-7-6">6-7-6</option>
                    <option value="7-8-7">7-8-7</option>
                    <option value="N-R-N">N-R-N</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="input2" class="col-sm-4 col-form-label">Test Sample:</label>
            <div class="col-sm-8">
                <input type="text" id="SAMPLE1" name="SAMPLE1" class="form-control input-custom" placeholder="Test Sample">
            </div>
        </div>
        <div class="form-group row">
            <label for="input2" class="col-sm-4 col-form-label">Cycles:</label>
            <div class="col-sm-8">
                <input type="text" id="Cycles1" name="CYCLES1" class="form-control input-custom" placeholder="Cycles">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">RPM:</label>
            <div class="col-sm-8">
                <input type="text" id="RPM1" name="RPM1" class="form-control input-custom" placeholder="RPM" >
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">GB TEMPERATURE:</label>
            <div class="col-sm-8">
                <input type="text" id="GBTEMP1" name="GBTEMP1" class="form-control input-custom" placeholder="GB TEMPERATURE">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">MOTOR TEMPERATURE:</label>
            <div class="col-sm-8">
                <input type="text" id="MBTEMP1" name="MBTEMP1" class="form-control input-custom"  placeholder="MOTOR TEMPERATURE">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">OIL TEMPERATURE:</label>
            <div class="col-sm-8">
                <input type="text" id="OBTEMP1" name="OBTEMP1" class="form-control input-custom"  placeholder="OIL TEMPERATURE">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">PRESSURE:</label>
            <div class="col-sm-8">
                <input type="text" id="PRESSURE1" name="PRESSURE1" class="form-control input-custom" placeholder="PRESSURE">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">REMARK:</label>
            <div class="col-sm-8">
                <input type="text" id="REMARK1" name="REMARK1" class="form-control input-custom" placeholder="REMARK">
            </div>
        </div>
        <!-- <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">SHIFT PERSON:</label>
            <div class="col-sm-8">
                <input type="text" id="PERSON1" name="PERSON1" class="form-control input-custom" placeholder="SHIFT PERSON">
            </div>
        </div> -->
        <input type="hidden" name="PERSON1" value="{{ Auth::user()->name }}">
      
    </div>

    <div id="group2" class="input-group">
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">Status:</label>
            <div class="col-sm-8">
                <select id="STATUS2" name="STATUS2" class="form-control input-custom" >
                <option value="">--Select Status--</option>
                    <option value="Start">Start</option>
                    <option value="Runnning">Runnning</option>
                    <option value="Stop">Stop</option>
                    <option value="Set Up In Progress">Set Up In Progress</option>
                    <option value="Breakdown">Breakdown</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Ideal">Ideal</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">Shift mode:</label>
            <div class="col-sm-8">
                <select id="MODE2" name="MODE2" class="form-control input-custom" >
                <option value="">--Select Shift Mode--</option>
                    <option value="1-N-1">1-N-1</option>
                    <option value="1-2-1">1-2-1</option>
                    <option value="2-3-2">2-3-2</option>
                    <option value="3-4-3">3-4-3</option>
                    <option value="4-5-4">4-5-4</option>
                    <option value="5-6-5">5-6-5</option>
                    <option value="6-7-6">6-7-6</option>
                    <option value="7-8-7">7-8-7</option>
                    <option value="N-R-N">N-R-N</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="input2" class="col-sm-4 col-form-label">Test Sample:</label>
            <div class="col-sm-8">
                <input type="text" id="SAMPLE2" name="SAMPLE2" class="form-control input-custom" placeholder="Test Sample">
            </div>
        </div>
        <div class="form-group row">
            <label for="input2" class="col-sm-4 col-form-label">Cycles:</label>
            <div class="col-sm-8">
                <input type="text" id="CYCLES2" name="CYCLES2" class="form-control input-custom"  placeholder="Cycles">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">RPM:</label>
            <div class="col-sm-8">
                <input type="text" id="RPM2" name="RPM2" class="form-control input-custom" placeholder="RPM">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">GB Temperature:</label>
            <div class="col-sm-8">
                <input type="text" id="GBTEMP2" name="GBTEMP2" class="form-control input-custom" placeholder="GB Temperature">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">MOTOR Temperature:</label>
            <div class="col-sm-8">
                <input type="text" id="MBTEMP2" name="MBTEMP2" class="form-control input-custom" placeholder="MOTOR Temperature">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">OIL Temperature:</label>
            <div class="col-sm-8">
                <input type="text" id="OBTEMP2" name="OBTEMP2" class="form-control input-custom" placeholder="OIL Temperature">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">Pressure:</label>
            <div class="col-sm-8">
                <input type="text" id="PRESSURE2" name="PRESSURE2" class="form-control input-custom" placeholder="Pressure">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">Remark:</label>
            <div class="col-sm-8">
                <input type="text" id="REMARK2" name="REMARK2" class="form-control input-custom" placeholder="Remark">
            </div>
        </div>
        <!-- <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">Shift Person:</label>
            <div class="col-sm-8">
                <input type="text" id="PERSON2" name="PERSON2" class="form-control input-custom" placeholder="Shift Person">
            </div>
        </div> -->
        <input type="hidden" name="PERSON2" value="{{ Auth::user()->name }}">
    </div>
    <div id="group3" class="input-group">
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">Status:</label>
            <div class="col-sm-8">
                <select id="STATUS3" name="STATUS3" class="form-control input-custom">
                <option value="">--Select Status--</option>
                    <option value="Start">Start</option>
                    <option value="Runnning">Runnning</option>
                    <option value="Stop">Stop</option>
                    <option value="Set Up In Progress">Set Up In Progress</option>
                    <option value="Breakdown">Breakdown</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Ideal">Ideal</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">Shift mode:</label>
            <div class="col-sm-8">
                <select id="MODE3" name="MODE3" class="form-control input-custom">
                <option value="">--Select Shift Mode--</option>
                    <option value="1-N-1">1-N-1</option>
                    <option value="1-2-1">1-2-1</option>
                    <option value="2-3-2">2-3-2</option>
                    <option value="3-4-3">3-4-3</option>
                    <option value="4-5-4">4-5-4</option>
                    <option value="5-6-5">5-6-5</option>
                    <option value="6-7-6">6-7-6</option>
                    <option value="7-8-7">7-8-7</option>
                    <option value="N-R-N">N-R-N</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">TEST GEAR:</label>
            <div class="col-sm-8">
                <select id="GEAR3" name="GEAR3" class="form-control input-custom">
                <option value="">--Select Test Gear--</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                    <option value="6th">6th</option>
                    <option value="7th">7th</option>
                    <option value="8th">8th</option>
                    <option value="Rev">Rev</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="input2" class="col-sm-4 col-form-label">Test Sample:</label>
            <div class="col-sm-8">
                <input type="text" id="SAMPLE3" name="SAMPLE3" class="form-control input-custom" placeholder="Test Sample:">
            </div>
        </div>
        <div class="form-group row">
            <label for="input2" class="col-sm-4 col-form-label">Cumm. Hrs:</label>
            <div class="col-sm-8">
                <input type="text" id="HRS3" name="HRS3" class="form-control input-custom" placeholder="Cumm. Hrs:">
            </div>
        </div>
        <div class="form-group row">
            <label for="input2" class="col-sm-4 col-form-label">Cycles:</label>
            <div class="col-sm-8">
                <input type="text" id="CYCLES3" name="CYCLES3" class="form-control input-custom" placeholder="Cycles" >
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">MM Motor RPM:</label>
            <div class="col-sm-8">
                <input type="text" id="RPM3" name="RPM3" class="form-control input-custom" placeholder="MM Motor RPM" >
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">MM Torque:</label>
            <div class="col-sm-8">
                <input type="text" id="MMTORQ3" name="MMTORQ3" class="form-control input-custom" placeholder="MM Torque">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">G1 RPM:</label>
            <div class="col-sm-8">
                <input type="text" id="G1RPM3" name="G1RPM3" class="form-control input-custom" placeholder="G1 RPM" >
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">G1 Torque:</label>
            <div class="col-sm-8">
                <input type="text" id="G1TORQ3" name="G1TORQ3" class="form-control input-custom" placeholder="G1 Torque" >
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">G2 RPM:</label>
            <div class="col-sm-8">
                <input type="text" id="G2RPM3" name="G2RPM3" class="form-control input-custom" placeholder="G2 RPM" >
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">G2 Torque:</label>
            <div class="col-sm-8">
                <input type="text" id="G2TORQ3" name="G2TORQ3" class="form-control input-custom" placeholder="G2 Torque">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">MM Temperature:</label>
            <div class="col-sm-8">
                <input type="text" id="MMTEMP3" name="MMTEMP3" class="form-control input-custom" placeholder="MM Temperature">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">G1 Temperature:</label>
            <div class="col-sm-8">
                <input type="text" id="G1TEMP3" name="G1TEMP3" class="form-control input-custom" placeholder="G1 Temperature" >
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">G2 Temperature:</label>
            <div class="col-sm-8">
                <input type="text" id="G2TEMP3" name="G2TEMP3" class="form-control input-custom" placeholder="G2 Temperature">
            </div>
        </div>

        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">Test GB OIL Temperature:</label>
            <div class="col-sm-8">
                <input type="text" id="OILTEMP3" name="OILTEMP3" class="form-control input-custom" placeholder="Test GB OIL TemperatureT">
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">Pressure:</label>
            <div class="col-sm-8">
                <input type="text" id="PRESSURE3" name="PRESSURE3" class="form-control input-custom" placeholder="Pressure" >
            </div>
        </div>
        <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">Remark:</label>
            <div class="col-sm-8">
                <input type="text" id="REMARK3" name="REMARK3" class="form-control input-custom" placeholder="Remark" >
            </div>
        </div>
        <!-- <div class="form-group row">
            <label for="input3" class="col-sm-4 col-form-label">SHIFT Person:</label>
            <div class="col-sm-8">
                <input type="text" id="PERSON3" name="PERSON3" class="form-control input-custom" placeholder="SHIFT Person" >
            </div>
        </div> -->
        <input type="hidden" name="PERSON3" value="{{ Auth::user()->name }}">
    </div>
   

 <!-- ======================================================================================================================== -->

                <div id="group4" class="input-group">
                    <div class="form-group row">
                        <label for="input10" class="col-sm-4 col-form-label">Input 10:</label>
                        <div class="col-sm-8">
                            <input type="text" id="input10" name="input10" class="form-control input-custom" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input11" class="col-sm-4 col-form-label">Input 11:</label>
                        <div class="col-sm-8">
                            <input type="text" id="input11" name="input11" class="form-control input-custom" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input12" class="col-sm-4 col-form-label">Input 12:</label>
                        <div class="col-sm-8">
                            <input type="text" id="input12" name="input12" class="form-control input-custom" >
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- <div class="text-center">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div> -->
            <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Register">
                        </div>
            <!-- <div id="successMessage" class="success-message text-center" style="display:none;"></div> -->
        </form>
    </div>

    <script>
        const optionsMapping = {
            option1: ["SYNCHROCONE TEST RIG I", "SYNCHROCONE TEST RIG II", "SYNCHROCONE TEST RIG III","SYNCHROCONE TEST RIG IV",
            "SYNCHROCONE TEST RIG V", "SYNCHROCONE TEST RIG VI", "CVT -I", "CVT -II"],
            option2: [ "RUNNING IN I", "RUNNING IN II","RUNNING IN III", "RUNNING IN IV"],
            option3: [ "GEAR BOX TEST RIG - I", "GEAR BOX TEST RIG - V", "RATR-IV",
            "GEAR BOX TEST RIG - III", "GEAR BOX TEST RIG - VI"],
            option4: ["SPARE-1", "SPARE-2", "SPARE-3",
                    "SPARE-4", "SPARE-5", "SPARE-6"],
        };

        function updateSecondDropdown() {
            const selectedValue1 = document.getElementById('options1').value;
            const options2 = document.getElementById('options2');

            options2.innerHTML = '<option value="">--Select an option--</option>';

            if (optionsMapping[selectedValue1]) {
                optionsMapping[selectedValue1].forEach(option => {
                    const newOption = document.createElement('option');
                    newOption.value = option;
                    newOption.textContent = option.charAt(0).toUpperCase() + option.slice(1);
                    options2.appendChild(newOption);
                });
            }
        }

        function showFields() {
            const groups = document.querySelectorAll('#dynamic-form .input-group');
            groups.forEach(group => {
                group.style.display = 'none';
            });

            const selectedValue1 = document.getElementById('options1').value;
            const selectedValue2 = document.getElementById('options2').value;

            document.getElementById('selectedOption2').textContent = selectedValue2 ? selectedValue2 : "None";
            let myVariable = selectedValue2 ? selectedValue2 : "None";
            //  document.getElementById("Cycles1").placeholder = myVariable;
            // document.getElementById("RPM1").placeholder = myVariable;
            // document.getElementById("input3").placeholder = myVariable;
            // document.getElementById("input4").placeholder = myVariable;

            if (selectedValue1) {
                const groupId1 = selectedValue1.charAt(selectedValue1.length - 1);
                document.getElementById('group' + groupId1).style.display = 'block';
            }

            if (selectedValue2) {
                const groupId2 = selectedValue2.charAt(selectedValue2.length - 1);
                document.getElementById('group' + groupId2).style.display = 'block';
            }
        }

        function cycleOptions(dropdownId, direction) {
            const dropdown = document.getElementById(dropdownId);
            const options = dropdown.options;
            let selectedIndex = dropdown.selectedIndex;

            selectedIndex += direction;

            if (selectedIndex < 1) {
                selectedIndex = options.length - 1;
            } else if (selectedIndex >= options.length) {
                selectedIndex = 1;
            }

            dropdown.selectedIndex = selectedIndex;

            if (dropdownId === 'options1') {
                updateSecondDropdown();
            }
            showFields();
        }

        function showSuccessMessage(event) {
            event.preventDefault(); // Prevent the default form submission
            document.getElementById('successMessage').textContent = "Form submitted successfully!";
            document.getElementById('successMessage').style.display = 'block';
            setTimeout(() => {
                document.getElementById('successMessage').style.display = 'none';
            }, 3000);
        }
    </script>

</body>

</html>
