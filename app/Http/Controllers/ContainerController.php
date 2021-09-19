<?php

namespace App\Http\Controllers;

use App\Models\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $containers = Container::all();
        return view('container.index', compact('containers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('container.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // "packing" => "required",
            // 'container_id' => "required",
            'name' => ["required"],
            "address" => "required",
            "phone" => "required",
        ]);

        $container = new Container;
        $container->name = $request->name;
        $container->address = $request->address;
        $container->phone = $request->phone;
        Session::flash('save_container', $container->save());
        return redirect()->route('containers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function show(Container $container)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $container = Container::findOrFail($id);
        return view('container.edit', compact('container'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // "packing" => "required",
            'name' => ["required", 'unique:goods'],
            "address" => "required",
            "phone" => "required",
        ]);
        $container = Container::findOrFail($id);
        // $container->packing = $request->packing;
        $container->name = $request->name;
        $container->address = $request->address;
        $container->phone = $request->phone;
        Session::flash('update_container', $container->save());
        return redirect()->route('containers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $container = Container::findOrFail($id);
        Session::flash('delete_container', $container->delete());
        return redirect()->route('containers.index');
    }
}
