<?php

namespace App\Http\Controllers;

use App\Models\Vouchers;
use App\Models\Pin;
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
        $data = Vouchers::orderBy('created_at','desc')->get();
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
        $voucher = Vouchers::where('plate_no',strtoupper($request->dk.' '.$request->no.' '.$request->kode))->count();
        if ($voucher > 0) {
            Alert::error('Sorry', 'You have got a voucher');
            return redirect()->back();
        } else {
            $data = new Vouchers;
            $data->code = 'BS'.strtoupper($request->dk.$request->no.$request->kode);
            $data->name = ucwords($request->name);
            $data->phone = $request->phone;
            $data->plate_no = strtoupper($request->dk.' '.$request->no.' '.$request->kode);
            $data->status = 'available';
            $data->auth = 'no';
            $data->created_at = Carbon::now('GMT')->format('Y-m-d H:i:s');
            $data->save();
            toast('Yay! you get a voucher','success');
            return redirect('voucher/BS'.strtoupper($request->dk.$request->no.$request->kode));
        }
    }

    public function item($code){
        $data = Vouchers::where('code',$code)->get();
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
        $data->auth = $request->auth;
        $data->save();
        return redirect()->back();
    }

    //PROSES REDEEM !!
    public function enterpin($code){
        return view('voucher.enterpin', compact('code'));
    }

    public function prosespin(Request $request, $code){
        $pin = Pin::where('pin', $request->pin)->count();
        if ($pin > 0) {
            Vouchers::where('code', $code)->update([
                'auth' => 'yes',
            ]);
            return redirect('scanned/'.$code);
        }else{
            Alert::error('Pin Salah', 'Tunjukan ke staff dealer untuk scan barcode');
            return redirect('enterpin/'.$code);
        }
    }

    public function scanned($code){
        $auth = Vouchers::where([
            ['code', $code],
            ['auth', 'yes'],
        ])->count();

        $cek = Vouchers::where([
            ['code', $code],
            ['status', 'available'],
        ])->count();
        
        if ($auth > 0) {
            if ($cek > 0) {
                Vouchers::where('code', $code)->update([
                    'status' => 'redeemed',
                ]);
                return redirect('redeemed/'.$code);
            }else{
                Alert::error('Sorry', 'Your voucher has been redeemed');
                return redirect()->route('generate');
            }
        }else{
            return redirect('enterpin/'.$code);
        }
    }

    // PROSES REDEEM !!
    public function redeemed($code){
        $data = Vouchers::where('code', $code)->get();
        return view('voucher.redeemed', compact('data'));
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
