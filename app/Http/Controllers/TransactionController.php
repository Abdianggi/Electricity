<?php

namespace App\Http\Controllers;

use App\Models\Electricity;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
   
    private $title = "Transaction";
    private $view = "pages.transaction.";

    /**
     * Cosntructor
     */
    public function __construct()
    {
    }

    public function getElectricity(Request $r) {
        $response = array();
        $response['success'] = false;
        $statusCode = 403;

        try {
            $electricity = Electricity::whereNumber($r->id)->with('product')->first();
            if (!$electricity) {
                throw new Exception("Electricity not found!");
            }

            $response['data'] = $electricity;
            

        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            return response()->json($response, $statusCode);
        }

        $response['message'] = 'electricity Found!';
        $response['success'] = true;
        $statusCode = 200;

        return response()->json($response, $statusCode);
    }

    public function payElectricity(Request $r){
        $response = array();

        DB::beginTransaction();
        try {

            $electricity = Electricity::whereNumber($r->id)->with('product')->first();
            // dd($electricity);
            if (!$electricity) {
                throw new Exception("Number Electricity Meter not found!");
            }

            $validator = Validator::make($r->all(), [
                'kwh' => 'required',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->withErrors);
            }

            $convercy           = (str_replace(' VA', '',$electricity->product->name) * 0.8)/1000;
            $pricekwh           = ($electricity->product->price/$convercy)*1;
            $total              = $pricekwh * $r->kwh;

            $data_transaction   = array(
                'name_product'  => $electricity->product->name,
                'price_product' => $electricity->product->price/$convercy,
                'convercy'      => $convercy,
                'price_perkwh'  => $pricekwh,
            );
    
            $tr                   = new Transaction();
            $tr->electricity_id   = $r->id;
            $tr->total            = $total;
            $tr->data_transaction = json_encode($data_transaction);
           
            $tr->save();

            $response['message']    = 'Transaction Succeed!';
            $response['type']       = 'success';
            $response['status']     = true;
            

        } catch (Exception $e) {
            DB::rollBack();
            
            $response['message'] = $e->getMessage();
            $response['type'] = 'error';
            $response['status'] = false;
            return response()->json($response);  
        }
        DB::commit();

        return response()->json($response);
    }

    public function index()
    {
        $electricity = Electricity::all();
        return view($this->view . "index", [
            'title' => "Edit by Abdi - " . $this->title,
            'electricity' => $electricity
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
