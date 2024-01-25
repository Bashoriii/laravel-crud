<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    public function index() {
        $employeeTable = Employee::all();
        return view('employee.index', ['employees' => $employeeTable]);
    }

    public function create() {
        return view('employee.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'nullable',
            'phone' => 'required | numeric',
            'email' => 'nullable',
            'province' => 'nullable',
            'city' => 'nullable',
            'street' => 'nullable',
            'zip_code' => 'nullable',
            'ktp_number' => 'required',
            'current_position' => 'nullable',
            'bank_account' => 'nullable',
            'bank_account_number' => 'nullable'
        ]);

        Employee::create($data);
        return redirect(route('table.index'));
    }

    public function edit(Employee $table) {
        return view('employee.edit', ['table' => $table]);
    }

    public function update(Employee $table, Request $request) {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'nullable',
            'phone' => 'required | numeric',
            'email' => 'nullable',
            'province' => 'nullable',
            'city' => 'nullable',
            'street' => 'nullable',
            'zip_code' => 'nullable',
            'ktp_number' => 'required',
            'current_position' => 'nullable',
            'bank_account' => 'nullable',
            'bank_account_number' => 'nullable'
        ]);

        $table->update($data);

        return redirect(route('table.index'))->with('success', 'Row Updated');
    }

    public function delete(Employee $table) {
        $table->delete();

        return redirect(route('table.index'))->with('success', 'Row Deleted');
    }
    
}
