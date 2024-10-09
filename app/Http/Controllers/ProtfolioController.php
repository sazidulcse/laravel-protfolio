<?php

namespace App\Http\Controllers;

use App\Models\Protfolio;
use Illuminate\Http\Request;

class ProtfolioController extends Controller {
    use \App\Helper\ImageManager;
    // Display view
    public function index() {
        $protfolios = Protfolio::where('created_by', auth()->user()->id)->latest()->get();
        return view('protfolios.index', compact('protfolios'));
    }

  
    

    // Show and create
    public function create() {
        return view('protfolios.create');
    }

    // Store a validate
    public function store(Request $request) {
        $request->validate([
            'protfolio_name' => 'required|string|max:255',
            'protfolio_link' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'bg_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = [];
        $data = $request->except(['image', 'bg_image']);

        $image = $request->file('image');

        $path = $image->store('images/protfolio');

        if ($file = $request->file('image')) {
            $fileData = $this->uploads($file, $path);
            $data['image'] = $fileData;
        }
        if ($file = $request->file('bg_image')) {
            $fileData = $this->uploads($file, $path);
            $data['bg_image'] = $fileData;
        }
        $data['created_by'] = auth()->user()->id; 
        Protfolio::create($data);
        return redirect()->route('protfolios.index')->with('success', 'Protfolio created successfully.');
    }

    // Show and editing 
    public function edit(Protfolio $protfolio) {
        return view('protfolios.edit', compact('protfolio'));
    }

    // Update protfolio
    public function update(Request $request, Protfolio $protfolio) {
        $request->validate([
            'protfolio_name' => 'required|string|max:255',
            'protfolio_link' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'bg_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = [];
        $data = $request->except(['image', 'bg_image']);

        $path = 'images/protfolio/';
        !is_dir($path) && mkdir($path, 0777, true);
        if ($file = $request->file('image')) {
            $this->removes($protfolio->image);
            $fileData = $this->uploads($file, $path);
            $data['image'] = $fileData;
        }
        if ($file = $request->file('bg_image')) {
            $this->removes($protfolio->bg_image);
            $fileData = $this->uploads($file, $path);
            $data['bg_image'] = $fileData;
        }
        $protfolio->update($data);
        return redirect()->route('protfolios.index')->with('success', 'Protfolio updated successfully.');
    }

    // Remove file
    public function destroy(Protfolio $protfolio) {
        $this->removes($protfolio->image);
        $this->removes($protfolio->bg_image);
        $protfolio->delete();
        return redirect()->route('protfolios.index')->with('success', 'Protfolio deleted successfully.');
    }
}
