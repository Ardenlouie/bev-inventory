<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

use App\Http\Requests\DepartmentAddRequest;
use App\Http\Requests\DepartmentEditRequest;

class DepartmentController extends Controller
{
    public function index(Request $request) {
        
        $departments = Department::orderBy('name', 'ASC')
            ->paginate(10)->appends(request()->query());

        return view('pages.departments.index')->with([
            'departments' => $departments
        ]);
    }

    public function create()
    {
        return view('pages.departments.create')->with([

        ]);
    }

    public function store(DepartmentAddRequest $request)
    {
        $department = new Department([
            'name' => $request->name,
            'prefix' => $request->prefix,
        ]);
        $department->save();

        activity('created')
            ->performedOn($department)
            ->log(':causer.name has created user :subject.name');

        return redirect()->route('department.index')->with([
            'message_success' => 'Department '.$department->name.' has been successfully created.'
        ]);
    }   

    public function edit($id)
    {
        $department = Department::findOrFail(decrypt($id));

        return view('pages.departments.edit')->with([
            'department' => $department,
        ]);
    }

    public function update(DepartmentEditRequest $request, $id)
    {
        $department = Department::findOrFail(decrypt($id));

        $department->update([
            'name' => $request->name,
            'prefix' => $request->prefix,
        ]);
        
        $changes_arr['changes'] = $department->getChanges();

        // logs
        activity('updated')
            ->performedOn($department)
            ->withProperties($changes_arr)
            ->log(':causer.name has updated user :subject.name');

        return back()->with([
            'message_success' => 'Department '.$department->name.' has been updated successfully.'
        ]);
    }
}
