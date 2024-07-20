<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Layer;

class LayerController extends Controller
{
    public readonly Layer $layer;
    public readonly User $owner;
    public function __construct()
    {
        $this->layer = new Layer();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owner = auth()->user();
        $layers = $owner->layers;
        return view("layers", ['layers' => $layers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layer_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner = auth()->user();
        $created =
        $this->layer->create([
            'name'=> $request->name,
            'description'=> $request->description,
            'is_protected'=> true,
            'user_id'=> $owner->id,                              //TROCAR DEPOIS !!!!!!!!!!!!!!!
            'public_id'=>uuid_create(),
            'password'=> bcrypt($request->password),
        ]);
        if ($created) {
            return redirect()->back()->with('status', 'Layer created successfully');
        }
            else
            return redirect()->back()->with('error','Layer could not be created');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $public_id)
    {
        //var_dump($this->layer->where('public_id', $public_id)->firstOrFail()); 

                                                    //TROCAR DEPOIS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

         $layer = $this->layer->where('public_id', $public_id)->firstOrFail();
         if($layer->is_protected){
            return view('layer', ['layer'=> $layer]);
        }else{
            $accounts = $layer->accounts;
            return view('accounts', ['accounts' => $accounts]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layer = $this->layer->where('public_id', $id)->firstOrFail();
        return view('layer_edit', ['layer'=> $layer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layer = $this->layer->where('public_id', $id)->firstOrFail();
        //var_dump($request->except('_token', '_method', 'public_id', 'user_id', 'created_at', 'updated_at', 'is_protected', 'change_pass'));
if($request->change_pass == 'on'){
            $request->merge(['password' => bcrypt($request->password)]);
        }
        else{
            $request->merge(['password' => $layer->password]);
        }
        $updated = $layer->update($request->except('_token', '_method', 'public_id', 'user_id', 'created_at', 'updated_at', 'change_pass', 'is_protected'));

        if ($updated) {
            return redirect()->back()->with('status', 'Layer updated successfully');
        }
            else
            return redirect()->back()->with('error','Layer could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layer = $this->layer->where('public_id', $id)->firstOrFail();
        $deleted = $layer->delete();
        if ($deleted) {
            return redirect()->back()->with('status', 'Layer deleted successfully');
        }
            else
            return redirect()->back()->with('error','Layer could not be deleted');
    }
}
