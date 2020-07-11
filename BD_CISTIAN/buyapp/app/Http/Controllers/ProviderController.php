<?php

namespace App\Http\Controllers;

use App\Product;
use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    public function index(Request $r)
    {
        $providers = Provider::all();
        return view('providers.index', ['providers' => $providers]);
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $r)
    {
        $inputs = $r->all();
        $provider = new Provider([
            'name' => $inputs['name'],
            'address' => $inputs['address'],
            'location' => $inputs['location'],
            'phone' => $inputs['phone'],
            'email' => $inputs['email'],
        ]);

        $provider->save();
        return redirect('/providers');
    }

    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('providers.edit', ['provider' => $provider]);
    }

    public function update($id, Request $r)
    {

        $inputs = $r->all();
        $provider = Provider::find($id);
        $provider->update([
            'name' => $inputs['name'],
            'address' => $inputs['address'],
            'location' => $inputs['location'],
            'phone' => $inputs['phone'],
            'email' => $inputs['email'],
        ]);
        return redirect('/providers');
    }

    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
        return redirect('/providers');
    }
}
