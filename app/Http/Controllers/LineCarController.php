<?php

namespace App\Http\Controllers;

use App\Models\LineCar;
use Illuminate\Http\Request;

class LineCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['data'] = \App\Models\LineCar::select('line_cars.*')->get();
        return view('linecar',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Request $request)
    {
        //
        $emps = LineCar::create([
            'lc_num' => $request->lc_num,
            'lc_name'=> $request->lc_name,
            
        ]);
        return redirect()->route('linecar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LineCar  $lineCar
     * @return \Illuminate\Http\Response
     */
    public function show(LineCar $lineCar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LineCar  $lineCar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['data'] = \App\Models\LineCar::select('line_cars.*')->where('id',$id)->get();
        return view('edit_line',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LineCar  $lineCar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data1 = array(
            'lc_num' => $request->lc_num,
            'lc_name'=> $request->lc_name,
    );
    LineCar::whereId($request->id)->update($data1);
    return redirect()->route('linecar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LineCar  $lineCar
     * @return \Illuminate\Http\Response
     */
    public function destroy(LineCar $lineCar)
    {
        //
    }
    public function delete($id)
    {
        $de['delete'] = \App\Models\LineCar::select('employees.*')->where('id',$id)->delete();
        //dd($data);
        return redirect('linecar'); 
    }

}
