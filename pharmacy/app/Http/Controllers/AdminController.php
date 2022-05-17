<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with('user')->orderBy('id' , 'desc')->get();
        
        return response()->view('cms.Admin.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.Admin.create');
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
            'gender' => 'required|in:Male,Female',
            'status' => 'required|in:Active,Disabled',
        ]);

        if(!$valid->fails()){
            $admins = new Admin();
            $admins->password = Hash::make($request->get('password'));
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move('storage/images/admins', $imageName);
            $admins->image = $imageName;

            $store = $admins->save();

            if($store) {
                $users = new User();
                $users->name = $request->get('name');
                $users->email = $request->get('email');
                $users->phone = $request->get('phone');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->actor()->associate($admins);

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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $admins = Admin::findOrFail($id);
        return response()->view('cms.Admin.edit',compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:20',
            'gender' => 'required|in:Male,Female',
            'status' => 'required|in:Active,Disabled',
        ]);

        if(!$valid->fails()){
            $admins =  Admin::findOrFail($id);
            $store = $admins->save();

            if($store) {
                $users =  $admins->user;
                $users->name = $request->get('name');
                $users->email = $request->get('email');
                $users->phone = $request->get('phone');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->actor()->associate($admins);

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Admin::destroy($id);

        return response()->json(['message' => $delete ? "Deleted Successfully" : "Faild To Delete"] , $delete ? 200 : 400);
    }
}
