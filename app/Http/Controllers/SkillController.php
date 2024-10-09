<?php

namespace App\Http\Controllers;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::where('created_by', auth()->user()->id)->latest()->get();
        return view('skills.index', compact('skills'));
    }


    public function create()
    {
        return view('skills.create');
    }

    // Store created skill
    public function store(Request $request)
    {
        $request->validate([
            'percent' => 'required|string|max:255',
            'skill_name' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;  
    
        Skill::create($data);
        return redirect()->route('skills.index')->with('success', 'Skill created successfully.');
    }

    // Show  skill
    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    // Update  skill
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'percent' => 'required|string|max:255',
            'skill_name' => 'required|string|max:255',
        ]);

        $skill->update($request->all());
        return redirect()->route('skills.index')->with('success', 'Skill updated successfully.');
    }

    // Remove 
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully.');
    }
}
