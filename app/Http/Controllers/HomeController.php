<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
class HomeController extends Controller
{
    use \App\Helper\ImageManager;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile = Profile::where('created_by', auth()->user()->id)->first();
        return view('home', compact('profile'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'profession' => 'required|string|max:191',
            'phone' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $profile = Profile::findOrFail($id);

        $data = [];
        $data = $request->except('image');

        $path = 'images/profile/';
        !is_dir($path) && mkdir($path, 0777, true);

        // if ($file = $request->file('image')) {
        //     $this->removes($profile->image);
        //     $fileData = $this->uploads($file, $path);
        //     $data['image'] = $fileData;
        // }
        if ($file = $request->file('image')) {
            if ($profile->image !== null) {
                $this->removes($profile->image);
            }
            $fileData = $this->uploads($file, $path);
            $data['image'] = $fileData;
        }

        $profile->update($data);

        return redirect()->route('home')->with('success', 'Profile updated successfully.');
    }
}
