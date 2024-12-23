$validOptions = [
    "SYNCHROCONE TEST RIG I",
    "SYNCHROCONE TEST RIG II",
    "SYNCHROCONE TEST RIG III",
    "SYNCHROCONE TEST RIG IV",
    "SYNCHROCONE TEST RIG V",
    "SYNCHROCONE TEST RIG VI",
    "CVT -I",
    "CVT -II"
];

// Define a PHP constant if the options match
if (in_array($employee->options2, $validOptions)) {
    define('sampleValue', option1);
} else {
    // Optionally handle case if options1 is not valid, e.g., define default or handle error.
    define('sampleValue', null);
}



        //   document.getElementById('options1').value = "{{ $employee->SAMPLE1 }}"; // Pre-selects Canada

          window.onload = function() {
    // Set the value of the first dropdown to the value passed from the backend (Laravel)
    // const sampleValue = "{{ $employee->SAMPLE1 }}"; // Assuming you pass SAMPLE1 from your Laravel controller

    document.getElementById('options1').value = sampleValue;

    // Call the functions to update the second dropdown and show the relevant fields
    updateSecondDropdown(); // This will update the second dropdown based on the first one
    showFields();            // This will show the relevant fields based on the selected options
};