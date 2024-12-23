<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestPlanRow;

class TestPlanRowController extends Controller
{
    
    
    public function edit($id)
    {
        // Find the row by its ID or fail if not found
        $row = TestPlanRow::findOrFail($id);
    
        // Pass the row to the view
        return view('test-plan-rows.edit', compact('row'));
    }

public function update(Request $request, $id)
{
    $row = TestPlanRow::findOrFail($id);
    $validated = $request->validate([
        'shift_mode' => 'required|string',
        'rpm' => 'required|integer',
        'target' => 'required|integer',
        'block_target' => 'required|integer',
        'block_1' => 'required|integer',
        'block_2' => 'required|integer',
        'block_3' => 'required|integer',
        'block_4' => 'required|integer',
    ]);

    $row->update($validated);
    return redirect()->route('test-plan.index')->with('success', 'Row updated successfully!');
}


public function destroy($id)
{
    $testPlan = TestPlanRow::findOrFail($id);
    $testPlan->delete();
    return redirect()->route('test-plans.index')->with('success', 'Test plan deleted successfully!');
}
}

