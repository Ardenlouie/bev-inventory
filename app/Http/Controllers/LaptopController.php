<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Company;
use App\Models\Device;
use App\Models\User;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\DeviceEditRequest;
use App\Http\Requests\DeviceAddRequest;
use Spatie\Activitylog\Models\Activity;
use Milon\Barcode\DNS2D;
use App\Exports\DevicesExport;
use Maatwebsite\Excel\Facades\Excel;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $laptops = Laptop::LaptopSearch($search, 10);

        return view('laptops.index')->with([
            'laptops' => $laptops,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('laptops.create')->with([

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeviceAddRequest $request)
    {
        $device = new Laptop([
            'company_id' => $request->company_id,
            'tag_id' => $request->tag_id,
            'device_id' => $request->device_id,
            'model' => $request->model,
            'serial' => $request->serial,
            'employee_id' => $request->employee_id,
            'department_id' => $request->department_id,
            'date_acquired' => $request->date_acquired,
            'age' => $request->age,
            'status' => $request->status,
            'specification' => $request->specification,
            'os' => $request->os,
            'office' => $request->office,
            'inclusions' => $request->inclusions,
            'issued_date' => $request->issued_date,
            'note' => $request->note,
            'previous_owner' => $request->previous_owner,
            'amount' => $request->amount,
        ]);
        $device->save();
        

        // logs
        activity('created')
            ->performedOn($device)
            ->log(':causer.name has created device :subject.name');

        return redirect()->route('laptops.index')->with([
            'message_success' => 'Device '.$device->name.' has been successfully created.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $devices = Laptop::findOrFail($id);

        $now = Carbon::now();
        $acquiredDate = Carbon::parse($devices->date_acquired);

        $years = $acquiredDate->diffInYears($now);
        $months = $acquiredDate->copy()->addYears($years)->diffInMonths($now);

        // Construct the age string
        $age = "{$years} year" . ($years != 1 ? 's' : '') . " and {$months} month" . ($months != 1 ? 's' : '');

        return view('laptops.show')->with([
            'devices' => $devices,
            'age' => $age,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $device = Laptop::findOrFail($id);
        $activities = Activity::where('subject_type', 'App\Models\Laptop')->latest()->take(5)->get();

        $acquiredDate = Carbon::parse($device->date_acquired);
        $issuedDate = Carbon::parse($device->issued_date);
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

        $devices = Device::all();
        $devices_arr = [];
        foreach($devices as $devicess) {
            $devices_arr[$devicess->id] = $devicess->name;
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


        return view('laptops.edit')->with([
            'device' => $device,
            'activities' => $activities,
            'acquiredDate' => $acquiredDate,
            'issuedDate' => $issuedDate,
            'age' => $age,
            'users' => $users_arr,
            'status_arr' => $status_arr,
            'companies' => $companies_arr,
            'devices' => $devices_arr,
            'departments' => $departments_arr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeviceEditRequest $request, $id)
    {
        $device = Laptop::findOrFail($id);
        $changes_arr['old'] = $device->getOriginal();

        $device->update([
            'company_id' => $request->company_id,
            'device_id' => $request->device_id,
            'model' => $request->model,
            'serial' => $request->serial,
            'employee_id' => $request->employee_id,
            'department_id' => $request->department_id,
            'date_acquired' => $request->date_acquired,
            'age' => $request->age,
            'status' => $request->status,
            'specification' => $request->specification,
            'os' => $request->os,
            'office' => $request->office,
            'inclusions' => $request->inclusions,
            'issued_date' => $request->issued_date,
            'note' => $request->note,
            'previous_owner' => $request->previous_owner,
            'amount' => $request->amount,
            'tag_id' => $request->tag_id,
        ]);
        
        $changes_arr['changes'] = $device->getChanges();

        // logs
        activity('updated')
            ->performedOn($device)
            ->withProperties($changes_arr)
            ->log(':causer.name has updated device :subject.name');

        return back()->with([
            'message_success' => 'Device '.$device->tag_id.' has been updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laptop $laptop)
    {
        //
    }

    public function downloadQrCode($id) {
    // Create an instance of DNS2D
        $dns = new DNS2D();

        // Generate the QR code as PNG
        $qrCodeData = $dns->getBarcodePNG(config('app.url').'/show/detail/'.encrypt($id), 'QRCODE', 50, 50);

        $fileName = 'qrcode-' . time() . '.png';
        $filePath = $fileName;

        // Save the QR code image
        file_put_contents($filePath, base64_decode($qrCodeData));

        // Serve it as a downloadable file
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function export()
    {
        return Excel::download(new DevicesExport, 'devices.xlsx');
    }
}
