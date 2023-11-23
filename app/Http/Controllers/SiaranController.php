<?php

namespace App\Http\Controllers;

use App\Models\Siaran;
use App\Http\Requests\StoreSiaranRequest;
use App\Http\Requests\UpdateSiaranRequest;
use GuzzleHttp\Psr7\Request;

class SiaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $poster = Siaran::all()->where('is_active', '1');

        // return view('welcome', ['siarans' => $poster]);
    }

    public function welcome(Siaran $siarans)
    {

        $siarans = Siaran::where('is_active', 1)->get();
        return view(
            'welcome',
            [
                'siarans' => $siarans
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Siaran $siaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siaran $siaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiaranRequest $request, Siaran $siaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siaran $siaran)
    {
        //
    }

    
}

