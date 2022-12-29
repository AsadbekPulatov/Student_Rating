<?php

namespace App\Http\Controllers;

use App\Models\Stipendiya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StipendiyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stipendiyas = Stipendiya::where('user_id', Auth::user()->id)->get();
        return view('admin.stipendiya.index', compact('stipendiyas'));
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
        Stipendiya::create($request->all());
        return redirect()->route('stipendiya.index')->with('success', 'Stipendiya added successfully');
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stipendiya  $stipendiya
     * @return \Illuminate\Http\Response
     */
    public function show(Stipendiya $stipendiya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stipendiya  $stipendiya
     * @return \Illuminate\Http\Response
     */
    public function edit(Stipendiya $stipendiya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stipendiya  $stipendiya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stipendiya $stipendiya)
    {
        $stipendiya = Stipendiya::find($request->id);
        $stipendiya->update($request->all());
        return redirect()->route('stipendiya.index')->with('success', 'Stipendiya updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stipendiya  $stipendiya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stipendiya $stipendiya)
    {
        $stipendiya->delete();
        return redirect()->route('stipendiya.index')->with('success', 'Stipendiya deleted successfully');
    }
}
