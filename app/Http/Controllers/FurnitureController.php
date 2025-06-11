<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;
use App\Http\Requests\FurnitureAddRequest;
use App\Http\Requests\FurnitureEditRequest;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\Item;
use App\Models\Department;
use App\Models\User;
use Milon\Barcode\DNS2D;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('furnitures.index')->with([

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('furnitures.create')->with([

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FurnitureAddRequest $request)
    {
        $furniture = new Furniture([
            'company_id' => $request->company_id,
            'tag_id' => $request->tag_id,
            'item_id' => $request->item_id,
            'item_name' => $request->item_name,
            'employee_id' => $request->employee_id,
            'department_id' => $request->department_id,
            'date_acquired' => $request->date_acquired,
            'age' => $request->age,
            'status' => $request->status,
            'specification' => $request->specification,
            'inclusions' => $request->inclusions,
            'issued_date' => $request->issued_date,
            'note' => $request->note,
            'amount' => $request->amount,
        ]);
        $furniture->save();
        

        // logs
        activity('created')
            ->performedOn($furniture)
            ->log(':causer.name has created furniture :subject.name');

        return redirect()->route('furnitures.index')->with([
            'message_success' => 'Furniture '.$furniture->name.' has been successfully created.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $furnitures = Furniture::findOrFail($id);

        $now = Carbon::now();
        $acquiredDate = Carbon::parse($furnitures->date_acquired);

        $years = $acquiredDate->diffInYears($now);
        $months = $acquiredDate->copy()->addYears($years)->diffInMonths($now);

        // Construct the age string
        $age = "{$years} year" . ($years != 1 ? 's' : '') . " and {$months} month" . ($months != 1 ? 's' : '');

        return view('furnitures.show')->with([
            'furnitures' => $furnitures,
            'age' => $age,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $furniture = Furniture::findOrFail($id);
        $activities = Activity::where('subject_type', 'App\Models\Furniture')->latest()->take(5)->get();

        $acquiredDate = Carbon::parse($furniture->date_acquired);
        $issuedDate = Carbon::parse($furniture->issued_date);
        $now = Carbon::now();
        $years = $acquiredDate->diffInYears($now);
        $months = $acquiredDate->copy()->addYears($years)->diffInMonths($now);

        // Construct the age string
        $age = "{$years} year" . ($years != 1 ? 's' : '') . " and {$months} month" . ($months != 1 ? 's' : '');

        $companies = Company::all();
        $companies_arr = [];
        foreach($companies as $company) {
            $companies_arr[$company->id] = $company->name;
        }

        $items = Item::all();
        $items_arr = [];
        foreach($items as $item) {
            $items_arr[$item->id] = $item->name;
        }

        $users = User::all();
        $users_arr = [];
        foreach($users as $user) {
            $users_arr[$user->id] = $user->name;
        }

        $departments = Department::all();
        $departments_arr = [];
        foreach($departments as $department) {
            $departments_arr[$department->id] = $department->name;
        }


        $status_arr = [
            'Assigned' => 'Assigned',
            'Available' => 'Available'
        ];

        return view('furnitures.edit')->with([
            'furniture' => $furniture,
            'activities' => $activities,
            'acquiredDate' => $acquiredDate,
            'issuedDate' => $issuedDate,
            'age' => $age,
            'users' => $users_arr,
            'status_arr' => $status_arr,
            'companies' => $companies_arr,
            'items' => $items_arr,
            'departments' => $departments_arr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FurnitureEditRequest $request, $id)
    {
        $furniture = Furniture::findOrFail($id);
        $changes_arr['old'] = $furniture->getOriginal();

        $furniture->update([
            'company_id' => $request->company_id,
            'item_id' => $request->item_id,
            'item_name' => $request->item_name,
            'employee_id' => $request->employee_id,
            'department_id' => $request->department_id,
            'date_acquired' => $request->date_acquired,
            'age' => $request->age,
            'status' => $request->status,
            'specification' => $request->specification,
            'inclusions' => $request->inclusions,
            'issued_date' => $request->issued_date,
            'note' => $request->note,
            'amount' => $request->amount,
        ]);
        
        $changes_arr['changes'] = $furniture->getChanges();

        // logs
        activity('updated')
            ->performedOn($furniture)
            ->withProperties($changes_arr)
            ->log(':causer.name has updated furniture :subject.name');

        return back()->with([
            'message_success' => 'Furniture '.$furniture->tag_id.' has been updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Furniture $furniture)
    {
        //
    }

    public function downloadQrCode($id) {
    // Create an instance of DNS2D
        $dns = new DNS2D();

        // Generate the QR code as PNG
        $qrCodeData = $dns->getBarcodePNG(config('app.url').'/show/furniture/'.encrypt($id), 'QRCODE', 50, 50);

        $fileName = 'qrcode-' . time() . '.png';
        $filePath = $fileName;

        // Save the QR code image
        file_put_contents($filePath, base64_decode($qrCodeData));

        // Serve it as a downloadable file
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
