<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = (new Contact())->get();
        return view("contact",["contacts" => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create_And_update",["type" => "create"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "string","min:5"],
            "email" => ["required", "email"],
            "phone" => ["required", "size:9"],
        ]);


        $check = Contact::where("email" , $request->email)->orWhere('phone',$request->phone)->exists();
        if($check){
            return Redirect::back()->withErrors([
                "Creation error, check if they have already been added."
            ]);
        }
        
        $contact = Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
        ]);

        if(!$contact){
            return Redirect::back()->withErrors([
                "Error creating contact."
            ]);
        }
        return redirect(url("/contact"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('detail',["contact" => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = Contact::find($id);
        return view('create_And_update',["type" => "update", "data" => $update]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => ["required", "string","min:5"],
            "email" => ["required", "email"],
            "phone" => ["required", "size:9"],
        ]);
        
        $check = Contact::where("id" , "<>", $request->id)->where(function($query) use ($request){
            $query->where("email",$request->email)->orWhere("phone",$request->phone);
        })->exists();
        if($check){
            return Redirect::back()->withErrors([
                "Error editing contact."
            ]);
        }
        $update = Contact::find($id);
        $contact = $update->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
        ]);

        if(!$contact){
            return Redirect::back()->withErrors([
                "Error creating contact."
            ]);
        }
        return redirect(url("/contact"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $contact = Contact::find($id)->delete();
            if(!$contact){

            }   
            return redirect(url("/contact"));
    }
}
