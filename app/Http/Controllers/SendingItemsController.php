<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\DetailSendingItem;
use App\Models\Good;
use App\Models\SendingItem;
use Illuminate\Http\Request;

class SendingItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sendingItems = SendingItem::all();
        return view('pengiriman.index', compact('sendingItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $containers = Container::all();
        $goods = Good::all();
        return view('pengiriman.create', compact('containers', 'goods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sendingItem = new SendingItem();
        // $lastDetailSendingItemsId = SendingItem::latest()->first();
        // if (!empty($lastDetailSendingItemsId->detailSendingItemsId)) {
        //     $sendingItem->detailSendingItemsId = sprintf("%06d", ((int)$lastDetailSendingItemsId->detailSendingItemsId + 1));
        // } else {
        //     $sendingItem->detailSendingItemsId = "000001";
        // }
        $sendingItem->receiver = $request->receiver;
        $sendingItem->save();

        foreach ($request->detailSendingItems as $detail) {
            $detailSendingItems = new DetailSendingItem;
            $detailSendingItems->container_id = $sendingItem['id'];
            $detailSendingItems->good_id = $detail['good_id'];
            $detailSendingItems->qty = $detail['qty'];
            // $detailSendingItems->foto = $detail['foto'];
            $detailSendingItems->save();
        }

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SendingItem  $sendingItem
     * @return \Illuminate\Http\Response
     */
    public function show(SendingItem $sendingItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SendingItem  $sendingItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SendingItem $sendingItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SendingItem  $sendingItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SendingItem $sendingItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SendingItem  $sendingItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SendingItem $sendingItem)
    {
        //
    }
}
