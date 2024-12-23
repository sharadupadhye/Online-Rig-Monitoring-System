<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{

    protected $employee;

    public function __construct(){

        $this->employee = new Employee();
        
    }
     

    public function index()
    {
        $response['employees'] = $this->employee->all();
        return view('pages.index')->with($response);
    }


    
    public function store(Request $request)
    {
      

        $this->employee->create($request->all());
        return redirect()->back();

    }

  
    // public function edit(string $id)
    // {
    //     $response['employee'] = $this->employee->find($id);
    //     return view('pages.edit')->with($response);
    // }


    // public function update(Request $request, string $id)
    // {
    //     $employee = $this->employee->find($id);

    //     $employee->update(array_merge($employee->toArray(), $request->toArray()));
    //     return redirect('employee');
    // }
     // EmployeeController.php
public function edit($id)
{
    $employee = Employee::findOrFail($id); // Fetch the employee data by ID
    return view('pages.edit', compact('employee')); // Pass data to the view
}

public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id); // Fetch the employee data by ID
    $employee->update($request->all()); // Update the data with the new input
    return redirect()->route('employee.index'); // Redirect to the employee listing page
}

    // public function destroy(string $id)
    // {
    //     $employee = $this->employee->find($id);
    //     $employee->delete();
    //     return redirect('employee');
    // }
    public function destroy($id)
    {
        $employee = Employee::find($id);
    
        if ($employee) {
            $employee->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }
    
    public function showDynamicTables()
    {
        return view('dynamic_tables');
    }

    
    public function status()
    {
        return view('status');
    }

    public function allTests()
    {
        return view('allTests');
    }

    public function material()
    {
        return view('material');
    }

    public function admin()
    {
        return view('admin');
    }

    public function register()
    {
        return view('register');
    }

    // public function showPage1()
    // {
    //     $response['employees'] = $this->employee->all();
    //     return view('pages.rigs.syn1')->with($response);
    // }

    public function showPage1()
    {
        $response['employees'] = $this->employee::where('options2', 'SYNCHROCONE TEST RIG I')->get();
        $time = Carbon::now('Asia/Kolkata');
        return view('pages.rigs.syn1',compact('time'))->with($response);
    }

    public function showPage2()
    {
        $response['employees'] = $this->employee::where('options2', 'SYNCHROCONE TEST RIG II')->get();
        return view('pages.rigs.syn2')->with($response);
    }

    public function showPage3()
    {
        $response['employees'] = $this->employee::where('options2', 'SYNCHROCONE TEST RIG III')->get();
        return view('pages.rigs.syn3')->with($response);
    }

    public function showPage4()
    {
        $response['employees'] = $this->employee::where('options2', 'SYNCHROCONE TEST RIG IV')->get();
        return view('pages.rigs.syn4')->with($response);
    }

    public function showPage5()
    {
        $response['employees'] = $this->employee::where('options2', 'SYNCHROCONE TEST RIG V')->get();
        return view('pages.rigs.syn5')->with($response);
    }

    public function showPage6()
    {
        $response['employees'] = $this->employee::where('options2', 'SYNCHROCONE TEST RIG VI')->get();
        return view('pages.rigs.syn6')->with($response);
    }

    public function showPage7()
    {
        $response['employees'] = $this->employee::where('options2', 'CVT -I')->get();
        return view('pages.rigs.cvt1')->with($response);
    }

    public function showPage8()
    {
        $response['employees'] = $this->employee::where('options2', 'CVT -II')->get();
        return view('pages.rigs.cvt2')->with($response);
    }

    public function showPage9()
    {
        $response['employees'] = $this->employee::where('options2', 'RUNNING IN I')->get();
        return view('pages.rigs.run1')->with($response);
    }

    public function showPage10()
    {
        $response['employees'] = $this->employee::where('options2', 'RUNNING IN II')->get();
        return view('pages.rigs.run2')->with($response);
    }

    public function showPage11()
    {
        $response['employees'] = $this->employee::where('options2', 'RUNNING IN III')->get();
        return view('pages.rigs.run3')->with($response);
    }

    public function showPage12()
    {
        $response['employees'] = $this->employee::where('options2', 'RUNNING IN IV')->get();
        return view('pages.rigs.run4')->with($response);
    }

    public function showPage13()
    {
        $response['employees'] = $this->employee::where('options2', 'GEAR BOX TEST RIG - I')->get();
        return view('pages.rigs.gbtr1')->with($response);
    }

    public function showPage14()
    {
        $response['employees'] = $this->employee::where('options2', 'GEAR BOX TEST RIG - V')->get();
        return view('pages.rigs.gbtr5')->with($response);
    }

    public function showPage15()
    {
        $response['employees'] = $this->employee::where('options2', 'RATR-IV')->get();
        return view('pages.rigs.ratr4')->with($response);
    }

    public function showPage16()
    {
        $response['employees'] = $this->employee::where('options2', 'GEAR BOX TEST RIG - III')->get();
        return view('pages.rigs.gbtr3')->with($response);
    }

    public function showPage17()
    {
        $response['employees'] = $this->employee::where('options2', 'GEAR BOX TEST RIG - VI')->get();
        return view('pages.rigs.gbtr6')->with($response);
    }
//     public function showPage1()
// {
//     $customers = Employee::where('rig_name', 'syn1')->get();
//         return view('pages.rigs.syn1', compact('employees'));
// }

}
