<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerRequest;
use App\Models\Owners;
use Illuminate\Http\Request;

class ownerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owners::all();
        return view('owners.index' , compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnerRequest $request)
    {
        if($request->validated()){

            $owner = Owners::create($request->validated());
            return redirect()->back()->with('message' , 'Added');
        }
        else{
            return redirect()->back()->with('alert' , 'Field');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = Owners::where('id' , $id)->first();
       // return $owner->id;
        return view('owners.edit' , compact('owner'));
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
        $owner = Owners::where('id' , $id)->first();
        $input['fname'] = $request->fname ?? $owner->fname;
        $input['lname'] = $request->lname ?? $owner->lname;
        $input['email'] = $request->email ?? $owner->email;
        $input['phone'] = $request->phone ?? $owner->phone;


        $owner->update($input);

        return redirect()->back()->with('message' , 'Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner = Owners::where('id' , $id)->delete();

        return redirect()->back()->with('message' , 'deleted');

    }
}
