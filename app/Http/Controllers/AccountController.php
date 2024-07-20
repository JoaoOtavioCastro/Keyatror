<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layer;
use App\Models\Account;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public readonly Layer $layer;
    public readonly User $owner;

    public readonly Account $account;


    public function index(Request $request)
    {
        $layer = Layer::where('public_id', $request->id)->firstOrFail();
        if($layer->verifyPassword($request->password)){
            $accounts = $layer->accounts;
            return view('accounts', ['accounts' => $accounts]);
        }
        else{
            return redirect()->back()->with('error','Password is incorrect');
        }        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
