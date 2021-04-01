<?php

namespace App\Http\Controllers;

use App\Models\Solicitation;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        return view('users.edit')
            ->with('user', $user)
            ->with('permissions', $permissions);
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
        $permissions = $request->permissions;
        $user = User::find($id);
        $user->profile->fill($request->all());
        if($user->profile->save()){
            $request->session()->flash('success', __('Record updated successfully'));
        }else{
            $request->session()->flash('error', __("Record can't be updated"));
        }
        if($permissions){
            $user->syncPermissions($permissions);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if($user){
            if($user->delete()){
                Solicitation::where('user_id', $id)->update(array('description' => 'User Eliminated'));
                $request->session()->flash('success', __('Record deleted successfully'));
            }else{
                $request->session()->flash('error', __("Record can't be deleted"));
            }
        }

        return redirect()->back();
    }
}
