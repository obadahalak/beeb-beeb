<?php

namespace App\Http\Controllers\resturant;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestRequest;
use App\Models\BeebBeebSections;
use App\Models\Owners;
use App\Models\Section;
use Illuminate\Http\Request;

class restController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rests = BeebBeebSections::all();

        return view('resturant.list' , compact('rests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owners::all();
        $sections = Section::all();
        // return $sections;

        return view('resturant.creata' , compact(['owners' , 'sections']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestRequest $request)
    {
       // return $request->all();
        $time=[
            'open_time'=>$request->time[0],
            'close_time'=>$request->time[1],
        ];

        $offer=[
            'expire_date'=>$request->offer[0],
            'code'=>$request->offer[1],
            'discount'=>$request->offer[2],
        ];

     $rests = BeebBeebSections::create($request->validated()+[
       'time' => $time,
       'offer'  => $offer
     ]);
    // return $rests;

        return redirect()->back()->with('message' , 'Added');
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
        $rest = BeebBeebSections::where('id' , $id)->get();

        return view('resturant.edit' , compact('rest'));
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
        $rest = BeebBeebSections::where('id' , $id)->get();
        $input['name'] = $request->name ?? $rest->name;
        $input['phone'] = $request->phone ?? $rest->phone;
        $input['address'] = $request->address ?? $rest->address;
        $input['long'] = $request->long ?? $rest->long;
        $input['lat'] = $request->lat ?? $rest->lat;
        $input['descripion'] = $request->descripion ?? $rest->descripion;
        $input['time'] = $request->time ?? $rest->time;
        $input['delivery'] = $request->delivery ?? $rest->delivery;
        $input['is_open'] = $request->is_open ?? $rest->is_open;
        $input['stauts'] = $request->stauts ?? $rest->stauts;

        $rest->update($input);

        return redirect()->back()->with('message' , 'updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
