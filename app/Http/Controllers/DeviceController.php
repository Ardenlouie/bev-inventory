<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

use App\Http\Requests\AddDeviceRequest;
use App\Http\Requests\EditDeviceRequest;

class DeviceController extends Controller
{
    public function index(Request $request) {
        
        $devices = Device::orderBy('name', 'ASC')
            ->paginate(10)->appends(request()->query());

        return view('pages.devices.index')->with([
            'devices' => $devices
        ]);
    }

    public function create()
    {
        return view('pages.devices.create')->with([

        ]);
    }

    public function store(AddDeviceRequest $request)
    {
        $device = new Device([
            'name' => $request->name,
            'prefix' => $request->prefix,
        ]);
        $device->save();

        activity('created')
            ->performedOn($device)
            ->log(':causer.name has created user :subject.name');

        return redirect()->route('device.index')->with([
            'message_success' => 'Device '.$device->name.' has been successfully created.'
        ]);
    }   

    public function edit($id)
    {
        $device = Device::findOrFail(decrypt($id));

        return view('pages.devices.edit')->with([
            'device' => $device,
        ]);
    }

    public function update(EditDeviceRequest $request, $id)
    {
        $device = Device::findOrFail(decrypt($id));

        $device->update([
            'name' => $request->name,
            'prefix' => $request->prefix,
        ]);
        
        $changes_arr['changes'] = $device->getChanges();

        // logs
        activity('updated')
            ->performedOn($device)
            ->withProperties($changes_arr)
            ->log(':causer.name has updated user :subject.name');

        return back()->with([
            'message_success' => 'Device '.$device->name.' has been updated successfully.'
        ]);
    }
}
