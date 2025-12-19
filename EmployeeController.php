<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function greetings(Request $request)
    {
        $name = $request->query('name');
        
        if ($name) {
            return "Hello, $name! Welcome to Catanduanes State University.";
        } else {
            return "Hello, Guest! Welcome to Catanduanes State University.";
        }
    }

    public function showForm()
    {
        return view('EmployeeForm');
    }

    // Create - Save new employee
    public function processForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $employee = Employee::create([
            'name' => $request->input('name'),
            'department' => $request->input('department'), 
            'position' => $request->input('position'), 
        ]);

        return view('employeeConfirmation', compact('employee'));
    }

    // Read - Display all employees
    public function listEmployees()
    {
        $employees = Employee::all();
        return view('employeeList', compact('employees'));
    }

    // Update - Show edit form
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('EmployeeForm', compact('employee'));
    }

    // Update - Process edit form
    // In your EmployeeController.php - update the update method
// Update the update method in EmployeeController.php
public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'position' => 'required|string|max:255',
    ]);

    $employee = Employee::findOrFail($id);
    $employee->update([
        'name' => $request->input('name'),
        'department' => $request->input('department'),
        'position' => $request->input('position'),
    ]);

    return redirect()->route('employees.list')->with('success', 'Employee updated successfully!');
    }
    // Delete - Remove employee
    // In EmployeeController.php - make sure destroy method looks like this
    public function destroy($id)
    {
    // Temporary debug
        \Log::info('Delete method called for ID: ' . $id);
        \Log::info('Request method: ' . request()->method());
    
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.list')->with('success', 'Employee deleted successfully!');
    }
}