<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class ListingsController extends Controller
{
    public function index(){
        $data = Listing::latest()->filter(request(['tag', 'search']))->paginate(6);
    
        return view('job-listing.index', ['listing' => $data]);

    }

    public function show(Listing $listing){
       
        return view('job-listing.show', ['singleList' => $listing]);
    }

    public function create(){
        return view('job-listing.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "company" => ['required', Rule::unique('listings', 'company')],
            "title" => ['required'],
            "location" => ['required'],
            "email" => ['required', 'email', Rule::unique('listings', 'email')],
            "tags" => ['required'],
            "website" => ['required'],
            "description" => ['required']
        ]);

        if($request->hasfile('logo')){
            $validated['logo'] = $request->file('logo')->store('logos','public');
        }

        $validated['user_id'] = auth()->id();

        $jobs = Listing::create($validated);
        return redirect('/')->with('message', 'Job Posted Successfully!');
    }

    public function edit(Request $request, Listing $listing){
        return view('job-listing.edit', ['listing' => $listing]);

    }

    public function update(Request $request, Listing $listing){

        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $validated = $request->validate([
            "company" => ['required'],
            "title" => ['required'],
            "location" => ['required'],
            "email" => ['required'],
            "tags" => ['required'],
            "website" => ['required'],
            "description" => ['required']
        ]);

        $listing->update($validated);
        
        return back()->with('message', 'Job Profile was Edited Successfully!');
    }

    public function destroy(Listing $listing){
        
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return back()->with('message', 'Job Profile has been deleted Successfully!');
    }

    public function manage(){
        $id = auth()->id();
        $listing = User::with(['listings' => function($q){
            $q->orderBy('created_at', 'desc');
            $q->filter(request(['tag', 'search']));
        }])->where('id', $id)->get();
        return view('job-listing.manage', ['list1' => $listing]);

       // return view('job-listing.manage', ['listings' => auth()->user()->listings()->filter(request(['tag', 'search']))->get()]);
    }
    
}
