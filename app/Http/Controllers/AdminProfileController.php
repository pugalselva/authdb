<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class AdminProfileController extends Controller
{
    public function index()
    {
        $employees =User::where('role', 'employee')->get();
        return view('admin.employees.index', compact('employees'));
    }

    public function show($id)
    {
        $employee == User::findOrFail(id);
        return view('admin.employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee =User::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('admin.employees.index')->with('success', 'Employee profile updated successfully');
    }

    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Employee profile deleted successfully');
    }
    public function create()
    {
        return view('admin.employees.create');
    }
    public function store(Request $request)
    {
        User::create($request->all() + ['role' => 'employee']);
        return redirect()->route('admin.employees.index')->with('success', 'New employee added successfully');
    }

}
