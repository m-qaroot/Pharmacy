<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSupplier($id)
    {
     
        $sups = Supplier::where('employee_id', $id)->with('employee')->orderBy('id', 'desc')->get();
        return response()->view('cms.Supplier.index', compact('sups','id'));
    }


    public function createSupplier($id)
    {
        $emps = Employee::with('suppliers')->get();
        return response()->view('cms.Supplier.create', compact('id' , 'emps'));
    }
    public function index()
    {
        $sups = Supplier::with('user')->orderBy('id','desc')->get();
        return response()->view('cms.Supplier.indexAll' , compact('sups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.Supplier.create');
        
    }

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
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:20',
            'address' => 'required|string|',
        ]);

        if(!$valid->fails()){
            $sups = new Supplier();
            $sups->employee_id = $request->get('employee_id');
            $store = $sups->save();

            if($store) {
                $users = new User();
                $users->name = $request->get('name');
                $users->email = $request->get('email');
                $users->phone = $request->get('phone');
                $users->gender = $request->get('gender');
                $users->address = $request->get('address');
                $users->actor()->associate($sups);

                $saved = $users->save();

                if($saved){
                    return response()->json(['message' => $saved ? "Added Successfully" : "Faild To Added"] , $saved ? 200 : 400);

                    // return  redirect()->route('admin.index');
                }else{
                return response()->json(['message' => "Faild To Added"] , 400);
                }
            }
        }else {
            return response()->json(['message' => $valid->getMessageBag()->first()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sups = Supplier::findOrFail($id);
        return response()->view('cms.Supplier.edit' , compact('sups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $valid = Validator($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:20',
            'address' => 'required|string|',
        ]);

        if(!$valid->fails()){
            $sups = Supplier::findOrFail($id);
        
            $store = $sups->save();

            if($store) {
                $users = $sups->user;
                $users->name = $request->get('name');
                $users->email = $request->get('email');
                $users->phone = $request->get('phone');
                $users->gender = $request->get('gender');
                $users->address = $request->get('address');
                $users->actor()->associate($sups);

                $saved = $users->save();

                if($saved){
                    return response()->json(['message' => $saved ? "Updated Successfully" : "Faild To Update"] , $saved ? 200 : 400);

                    // return  redirect()->route('admin.index');
                }else{
                return response()->json(['message' => "Faild To Update"] , 400);
                }
            }
        }else {
            return response()->json(['message' => $valid->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $delete = Supplier::destroy($id);
    
            return response()->json(['message' => $delete ? "Deleted Successfully" : "Faild To Delete"] , $delete ? 200 : 400);
        }
    }
}
