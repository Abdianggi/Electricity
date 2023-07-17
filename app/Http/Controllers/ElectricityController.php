<?php

namespace App\Http\Controllers;

use App\Models\Electricity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ElectricityController extends Controller
{
    private $title = "Electricity Meter";
    private $view = "pages.electricity.";

    /**
     * Cosntructor
     */
    public function __construct()
    {
        
    }

    /**
     * Render datatable
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function datatable(Request $request): JsonResponse
    {

        if ($request->ajax()) {
            $result = Electricity::with('product')->latest();

            return DataTables::of($result)
                        ->addIndexColumn()
                        ->make(true);
        }
        return abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\View\View
     */
    public function index(): View
    {
        return view($this->view . "index", [
            'title' => "List of " . $this->title
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
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function show(Electricity $electricity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function edit(Electricity $electricity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electricity $electricity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Electricity $electricity)
    {
        //
    }
}
