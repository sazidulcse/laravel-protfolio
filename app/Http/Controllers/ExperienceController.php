<?php
namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    // Display show
    public function index()
    {
        $experiences = Experience::where('created_by', auth()->user()->id)->latest()->get();
        return view('experiences.index', compact('experiences'));
    }

    // create form
    public function create()
    {
        return view('experiences.create');
    }

    // Store and validation
    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;  
    
        Experience::create($data);
        return redirect()->route('experiences.index')->with('success', 'Experience created successfully.');
    }

    // Show editing
    public function edit(Experience $experience)
    {
        return view('experiences.edit', compact('experience'));
    }

    // Update
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $experience->update($request->all());
        return redirect()->route('experiences.index')->with('success', 'Experience updated successfully.');
    }

    // Removeoption
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience deleted successfully.');
    }
}

