<?php

namespace App\Http\Controllers;

use App\Models\Vouchers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Alert;

class VouchersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate(){
        return view('index');
    }

    public function index()
    {
        $data = Vouchers::all();
        return view('voucher.index',compact('data'));
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
        $voucher = Vouchers::where('phone',$request->phone)->count();
        if ($voucher > 0) {
            Alert::error('Sorry', 'You have got a voucher');
            return redirect()->back();
        } else {
            $data = new Vouchers;
            $data->code = 'BS'.$request->phone;
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->status = 'available';
            $data->created_at = Carbon::now('GMT')->format('Y-m-d H:i:s');
            $data->save();
            toast('Yay! you get a voucher','success');
            return redirect('voucher/'.$request->phone);
        }
    }

    public function item($phone){
        $data = Vouchers::where('phone',$phone)->get();
        return view('voucher.item', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vouchers  $vouchers
     * @return \Illuminate\Http\Response
     */
    public function show(Vouchers $vouchers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vouchers  $vouchers
     * @return \Illuminate\Http\Response
     */
    public function edit(Vouchers $vouchers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vouchers  $vouchers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Vouchers::find($request->id);
        $data->status = $request->update;
        $data->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vouchers  $vouchers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vouchers $vouchers)
    {
        //
    }
}
