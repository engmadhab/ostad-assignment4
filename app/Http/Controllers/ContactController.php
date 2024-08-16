<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index(Request $request){
        $query = Contact::query();

        // Sorting A -Z
        if ($request->has('sortaz')) {
            $query->orderBy($request->get('sortaz'), 'asc');
        }

        // Sorting Z -A
        if ($request->has('sortza')) {
            $query->orderBy($request->get('sortza'), 'desc');
        }
        

        // Search
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        $contacts = $query->get();
        return view('contacts.index',compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
        ]);


        try{
            Contact::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['email' => 'The email address has already been taken.']);
        }
       
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');

    }
    public function show($id)
    {
        $contactDetails = Contact::find($id);
        return view('contacts.show', compact('contactDetails'));
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,'.$contact->id,
        ]);

        try{
            $contact->update($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['email' => 'The email address has already been taken.']);
        }       

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
