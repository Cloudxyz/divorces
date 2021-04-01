<?php

namespace App\Http\Controllers;

use App\Models\TypeDivorce;
use App\Models\Solicitation;
use App\Models\StatusSolicitation;
use Illuminate\Http\Request;

class SolicitationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(current_user()->hasRole('client')){
            $solicitations = Solicitation::where('user_id', current_user()->id)->get();
        }else{
            $solicitations = Solicitation::all();
        }
        return view('solicitations.index')
                ->with('solicitations', $solicitations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typesDivorces = TypeDivorce::all();
        return view('public.solicitations.create')
                ->with('typesDivorces', $typesDivorces);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitation = new Solicitation;
        $solicitation->user_id          = check_auth();
        $solicitation->divorce_id       = $request->divorce_id;
        $solicitation->name_client      = $request->name_client;
        $solicitation->telephone_client = $request->telephone_client;
        $solicitation->name_couple      = $request->name_couple;
        $solicitation->description      = $request->description;
        $solicitation->status           = 1;

        if($solicitation->save()){
            $request->session()->flash('success', __('Record created successfully'));
        }else{
            $request->session()->flash('error', __("Record can't be created"));
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitation = Solicitation::find($id);
        $typeDivorces = TypeDivorce::find($solicitation->divorce_id);
        return view('solicitations.show')
                ->with('typeDivorces', $typeDivorces)
                ->with('solicitation', $solicitation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitation = Solicitation::find($id);
        $typesDivorces = TypeDivorce::all();
        $statusSoliciations = StatusSolicitation::all();
        return view('solicitations.edit')
                ->with('solicitation', $solicitation)
                ->with('statusSoliciations', $statusSoliciations)
                ->with('typesDivorces', $typesDivorces);
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
        $solicitation = Solicitation::find($id);
        $solicitation->divorce_id       = $request->divorce_id;
        $solicitation->name_client      = $request->name_client;
        $solicitation->telephone_client = $request->telephone_client;
        $solicitation->name_couple      = $request->name_couple;
        $solicitation->description      = $request->description;
        $solicitation->status           = $request->status;

        if($solicitation->save()){
            $request->session()->flash('success', __('Record updated successfully'));
        }else{
            $request->session()->flash('error', __("Record can't be updated"));
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
        $solicitation = Solicitation::find($id);
        if($solicitation){
            $solicitation->status = 4;
            if($solicitation->save()){
                $request->session()->flash('success', __('Record deleted successfully'));
            }else{
                $request->session()->flash('error', __("Record can't be deleted"));
            }
        }

        return redirect()->back();
    }

    public function historial($id)
    {
        $audits = Solicitation::find($id)->audits;
        return view('solicitations.audits')
                ->with('audits', $audits);
    }
}
