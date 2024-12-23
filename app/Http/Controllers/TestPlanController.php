<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestPlan;
use App\Models\TestPlanRow;

class TestPlanController extends Controller
{
    protected $testPlan;
    /**
     * Show the form for creating test plans.
     * 
     */
    public function index()
{
    // Fetch all test plans with their rows
    $testPlans = TestPlan::with('rows')->get();

    return view('pages.TestPlanes', compact('testPlans'));
}

//=====================================================================================================================================
public function show($id)
{
    $testPlan = TestPlan::findOrFail($id);
    return view('pages.planEdit', compact('testPlan'));
}

// Edit a test plan
// public function edit($id)
// {
//     $testPlan = TestPlan::findOrFail($id);
//     return view('pages.planEdit', compact('testPlan'));
// }

// // Update a test plan
// public function update(Request $request, $id)
// {
//     $testPlan = TestPlan::findOrFail($id);
//     $testPlan->update($request->all());
//     return redirect()->route('pages.planEdit', $testPlan->id);
// }
//================================start new update and edit=====================================================================================================
public function edit($id)
{
    $testPlan = TestPlan::with('rows')->findOrFail($id); // Eager load rows
    return view('pages.planEdit', compact('testPlan'));
}

// Update TestPlan and Rows
public function update(Request $request, $id)
{
    $request->validate([
        'details' => 'required|string|max:255',
        'remark' => 'nullable|string|max:255',
        'rows.*.shift_mode' => 'required|string',
        'rows.*.rpm' => 'required|integer',
        'rows.*.target' => 'required|integer',
        'rows.*.block_target' => 'nullable|integer',
        'rows.*.block_1' => 'nullable|integer',
        'rows.*.block_2' => 'nullable|integer',
        'rows.*.block_3' => 'nullable|integer',
        'rows.*.block_4' => 'nullable|integer',
    ]);

    // Update TestPlan
    $testPlan = TestPlan::findOrFail($id);
    $testPlan->update([
        'details' => $request->input('details'),
        'remark' => $request->input('remark'),
    ]);

    // Update TestPlanRows
    foreach ($request->input('rows') as $rowId => $rowData) {
        $row = TestPlanRow::findOrFail($rowId);
        $row->update($rowData);
    }

    return redirect()->route('test-plans.index')->with('success', 'Test Plan and Rows updated successfully.');
}
//================================end new update and edit=====================================================================================================

// Delete a test plan
    // public function destroy($id)
    // {
    //     $employee = Employee::find($id);
    
    //     if ($employee) {
    //         $employee->delete();
    //         return response()->json(['message' => 'Record deleted successfully']);
    //     } else {
    //         return response()->json(['message' => 'Record not found'], 404);
    //     }
    // }
    // public function destroy($id)
    // {
    //     $testPlan = TestPlan::find($id);
    
    //     if ($testPlan) {
    //         $testPlan->delete();
    //         return response()->json(['message' => 'Record deleted successfully']);
    //     } else {
    //         return response()->json(['message' => 'Record not found'], 404);
    //     }
    // }
    public function destroy($id)
{
    $testPlan = TestPlan::findOrFail($id);
    $testPlan->delete();
    return redirect()->route('test-plans.index')->with('success', 'Test plan deleted successfully!');
}
//=====================================================================================================================================



    public function create()
    {
        return view('dynamic_tables');
    }

    /**
     * Store the test plans and their rows in the database.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'table_details' => 'required|array',
            'table_details.*' => 'required|string|max:255',
            'oil' => 'required|array',
            'oil.*' => 'required|string|max:255',
            'remarks' => 'nullable|array',
            'shift_mode' => 'required|array',
            'shift_mode.*' => 'required|array',
            'rpm' => 'required|array',
            'rpm.*' => 'required|array',
            'target' => 'required|array',
            'target.*' => 'required|array',
            'block_target' => 'required|array',
            'block_target.*' => 'required|array',
            'block_1' => 'required|array',
            'block_1.*' => 'required|array',
            'block_2' => 'required|array',
            'block_2.*' => 'required|array',
            'block_3' => 'required|array',
            'block_3.*' => 'required|array',
            'block_4' => 'required|array',
            'block_4.*' => 'required|array',
        ]);

        // Loop through each test plan
        foreach ($request->table_details as $index => $details) {
            // Create the test plan
            $testPlan = TestPlan::create([
                'details' => $details,
                'remark' => $request->remarks[$index] ?? null,
            ]);

            // Prepare rows for the test plan
            $rows = [];
            foreach ($request->shift_mode[$index] as $rowIndex => $shiftMode) {
                $rows[] = [
                    'test_plan_id' => $testPlan->id,
                    'shift_mode' => $shiftMode,
                    'rpm' => $request->rpm[$index][$rowIndex],
                    'target' => $request->target[$index][$rowIndex],
                    'block_target' => $request->block_target[$index][$rowIndex],
                    'block_1' => $request->block_1[$index][$rowIndex],
                    'block_2' => $request->block_2[$index][$rowIndex],
                    'block_3' => $request->block_3[$index][$rowIndex],
                    'block_4' => $request->block_4[$index][$rowIndex],
                ];
            }

            // Insert rows into the database
            TestPlanRow::insert($rows);
        }

        return redirect()->back()->with('success', 'Test plans saved successfully!');
    }
}
