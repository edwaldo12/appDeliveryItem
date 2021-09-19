<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\Supplier;
use App\Models\Container;
use Illuminate\Support\Facades\Session;

class GoodController extends Controller
{
    public function index()
    {
        $goods = Good::all();
        return view('good.index', compact('goods'));
    }

    public function create()
    {
        return view('good.create');
    }

    public function store(Request $request)
    {
        $goods = Good::all();

        // foreach ($goods as $good) {
        //     if ($request->container_id == $good->container_id && $request->name == $good->name) {

        //         $request->validate([
        //             'name' => ["required", 'unique:goods']
        //         ]);

        //         return redirect()->route('goods.index');
        //     }
        // }

        $request->validate([
            // "packing" => "required",
            // 'container_id' => "required",
            'name' => ["required", 'unique:goods'],
            "price" => "required",
            "stock" => "required",
            "supplier_name" => "required"
        ]);

        $good = new Good;
        // $good->container_id = $request->container_id;
        // $good->packing = $request->packing;
        $good->name = $request->name;
        $good->price = $request->price;
        $good->supplier_name = $request->supplier_name;
        $good->stock = $request->stock;
        Session::flash('save_good', $good->save());
        return redirect()->route('goods.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $container = Container::all();
        $good = Good::findOrFail($id);
        return view('good.edit', compact('good', 'container'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // "packing" => "required",
            'name' => ["required", 'unique:goods'],
            "price" => "required",
            "stock" => "required",
            'supplier_name' => "required"
        ]);
        $good = Good::findOrFail($id);
        // $good->packing = $request->packing;
        $good->name = $request->name;
        $good->price = $request->price;
        $good->supplier_name = $request->supplier_name;
        $good->stock = $request->stock;
        Session::flash('update_good', $good->save());
        return redirect()->route('goods.index');
    }

    public function destroy($id)
    {
        $good = Good::findOrFail($id);
        Session::flash('delete_good', $good->delete());
        return redirect()->route('goods.index');
    }
}
