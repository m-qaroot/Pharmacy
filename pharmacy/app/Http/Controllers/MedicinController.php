<?php

namespace App\Http\Controllers;

use App\Models\Medicin;
use App\Models\Employee;
use Illuminate\Http\Request;

class MedicinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMedicin($id)
    {
        $meds = Medicin::where('employee_id', $id)->with('employee')->orderBy('id', 'desc')->get();
        return response()->view('cms.Medicin.index', compact('meds','id'));
    }


    public function createMedicin($id)
    {
        $emps = Employee::with('medicins')->get();
        return response()->view('cms.Medicin.create', compact('id','emps'));
    }

    public function index()
    {
        $meds = Medicin::get();
        return response()->view('cms.Medicin.indexAll' , compact('meds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return response()->view('cms.Medicin.create');
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator($request->all(), [
            'name' => 'required|string|max:100',
            'type' => 'required|',
            'quantity' => 'required|numeric',
            'prod_date' => 'required|date',
            'exp_date' => 'required|date',
            'cost_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
        ]);

        if(!$valid->fails()){
            $meds = new Medicin();
            
            $meds->name = $request->get('name');
            $meds->type = $request->get('type');
            $meds->quantity = $request->get('quantity');
            $meds->prod_date = $request->get('prod_date');
            $meds->exp_date = $request->get('exp_date');
            $meds->cost_price = $request->get('cost_price');
            $meds->sell_price = $request->get('sell_price');
            $meds->discount_price = $request->get('discount_price');
            $meds->employee_id = $request->get('employee_id');

            $store = $meds->save();

            if($store){
                return response()->json(['message' => $store ? "Added Medicin Successfully" : "Faild To Add Medicin"] , $store ? 200 : 400);
            }else{
            return response()->json(['message' => "Faild To Add Medicin"] , 400);
            }

        }else {
            return response()->json(['message' => $valid->getMessageBag()->first()], 400);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicin  $medicin
     * @return \Illuminate\Http\Response
     */
    public function show(Medicin $medicin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicin  $medicin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meds = Medicin::FindOrFail($id);
        return response()->view('cms.Medicin.edit' , compact('meds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicin  $medicin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $valid = Validator($request->all(), [
            'name' => 'required|string|max:100',
            'type' => 'required|',
            'quantity' => 'required|numeric',
            'prod_date' => 'required|date',
            'exp_date' => 'required|date',
            'cost_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
        ]);

        if(!$valid->fails()){
            $meds = Medicin::findOrFail($id);
            
            $meds->name = $request->get('name');
            $meds->type = $request->get('type');
            $meds->quantity = $request->get('quantity');
            $meds->prod_date = $request->get('prod_date');
            $meds->exp_date = $request->get('exp_date');
            $meds->cost_price = $request->get('cost_price');
            $meds->sell_price = $request->get('sell_price');
            $meds->discount_price = $request->get('discount_price');

            $store = $meds->save();

            if($store){
                return response()->json(['message' => $store ? "Added Medicin Successfully" : "Faild To Add Medicin"] , $store ? 200 : 400);
            }else{
            return response()->json(['message' => "Faild To Add Medicin"] , 400);
            }

        }else {
            return response()->json(['message' => $valid->getMessageBag()->first()], 400);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicin  $medicin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Medicin::destroy($id);

        return response()->json(['message' => $delete ? "Deleted Successfully" : "Faild To Delete"] , $delete ? 200 : 400);
    }
      
}
