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


    public function index(string $id)
    {
        $layer = Layer::where('public_id', $id)->firstOrFail();
        $accounts = $layer->accounts;
        return view('accounts', ['accounts' => $accounts, 'layer' => $id]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        return view('account_create', ['layer' => $id,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $layer = Layer::where('public_id', $request->layer_id)->firstOrFail()->id;
        $account = new Account();
        $created = $account->create([
            'name' => $request->name,
            'notes' => $request->notes,
            'layer_id' => $layer,
            'public_id' => uuid_create(),
            'username' => $request->username,
            'password' => $request->password,
            'url' => $request->url,
            'email' => $request->email,
        ]);
        if ($created) {
            return redirect()->back()->with('status', 'Account created successfully');
        } else {
            return redirect()->back()->with('error', 'Account could not be created');
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $account = Account::where('public_id', $id)->firstOrFail();
        return view('account_edit', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = Account::where('public_id', $id)->firstOrFail();
        $updated = $account->update([
            'name' => $request->name,
            'notes' => $request->notes,
            'username' => $request->username,
            'password' => $request->password,
            'url' => $request->url,
            'email' => $request->email,
        ]);
        if ($updated) {
            return redirect()->back()->with('status', 'Account updated successfully');
        } else {
            return redirect()->back()->with('error', 'Account could not be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = Account::where('public_id', $id)->firstOrFail();
        $deleted = $account->delete();
        if ($deleted) {
            return redirect()->back()->with('status', 'Account deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Account could not be deleted');
        }
    }
}
