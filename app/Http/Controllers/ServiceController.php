<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use \App\Helper\ImageManager;
    // Display show
    public function index()
    {
        $services = Service::where('created_by', auth()->user()->id)->latest()->get();
        return view('services.index', compact('services'));
    }

    // Show an create
    public function create()
    {
        return view('services.create');
    }

    // Store a newly created
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $data = [];
        $data = $request->except('image');

        $path = 'images/service/';
        !is_dir($path) && mkdir($path, 0777, true);
        if ($file = $request->file('image')) {
            $fileData = $this->uploads($file, $path);
            $data['image'] = $fileData;
        }
        $data['created_by'] = auth()->user()->id;  
    
        Service::create($data);
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    // Edit mathod
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    // Update an service
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $data = [];
        $data = $request->except('image');

        $path = 'images/service/';
        !is_dir($path) && mkdir($path, 0777, true);
        if ($file = $request->file('image')) {
            $this->removes($service->image);
            $fileData = $this->uploads($file, $path);
            $data['image'] = $fileData;
        }
        $service->update($data);
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Remove 
    public function destroy(Service $service)
    {
        $this->removes($service->image);
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
