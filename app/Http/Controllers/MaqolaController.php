<?php

namespace App\Http\Controllers;

use App\Models\Maqola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaqolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maqolalar = Maqola::where('user_id', Auth::id())->get();
        return view('admin.maqola.index', compact('maqolalar'));
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
        Maqola::create($request->all());
        return redirect()->back()->with('success', 'Maqola muvaffaqiyatli saqlandi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maqola  $maqola
     * @return \Illuminate\Http\Response
     */
    public function show(Maqola $maqola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maqola  $maqola
     * @return \Illuminate\Http\Response
     */
    public function edit(Maqola $maqola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maqola  $maqola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maqola $maqola)
    {
        $maqola = Maqola::find($request->id);
        $maqola->update($request->all());
        return redirect()->back()->with('success', 'Maqola muvaffaqiyatli yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maqola  $maqola
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maqola $maqola)
    {
        $maqola->delete();
        return redirect()->back()->with('success', 'Maqola muvaffaqiyatli o`chirildi');
    }
}
