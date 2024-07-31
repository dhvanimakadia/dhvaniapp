<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index(Request $request)  
    {
        $query = Owner::query();
    
        // Check if there is a search term
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
    
        $owner = $query->orderBy('name', 'asc')->get();
    
        return view('owner.index', compact('owner'));
    }
    
   public function create()
        {
            return view('owner.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif',
                'role' => 'required|string',
                'email' => 'required|string',
            ]);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('images'), $imageName);
    
                $imagePath = $imageName;
            } else {
                $imagePath = null;
            }

        
            $owner = new Owner();
            $owner->name = $request->input('name');
            $owner->email = $request->input('email');
            $owner->role = $request->input('role');
            $owner->image = $imageName;
        
            $owner->save();
        
            return redirect()->route('owner.index'); 
        }
        
    
        public function edit($id)
        {
            $owner = Owner::findOrFail($id);
            return view('owner.edit', compact('owner'));
        }
        public function update(Request $request, $id)
        {
            $owner = Owner::findOrFail($id);
            $imageName= "";
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('images'), $imageName);
    
            } else {
                $imageName = $request->old_image;
            }
            // Update other fields
            $owner->name = $request->input('name');
            $owner->email = $request->input('email');
            $owner->role = $request->input('role');
            $owner->image = $imageName;
            // Check if an image is uploaded
           
            // print_r($owner->image);exit;
            $owner->save();
                
                return redirect()->route('owner.index');
        }


        public function destroy($id)
        {
            $owner = Owner::findOrFail($id);
            $owner->delete();
          
            return redirect()->route('owner.index')->with('success', 'Owner deleted successfully.');
        }


        public function show($id)
        {
            $owner = Owner::findOrFail($id);
            return view('owner.detail', compact('owner'));
        }

        public function see($id)
        {
            $owner = Owner::findOrFail($id);
        return view('owner.see',compact('owner'));
        }

}
