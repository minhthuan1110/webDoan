<?php

namespace App\Http\Controllers;

use App\Repositories\Vehicle\VehicleRepositoryInterface;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $repo;

    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->repo = $vehicleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $vehicles = $this->repo->getAll(['id', 'name', 'created_at']);
        return view('backend.vehicle.index', compact('vehicles'));
    }

    public function indexData()
    {
        return response()->json($this->repo->getAll(['id', 'name']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirect
     */
    public function store(Request $request)
    {
        $rs = $this->repo->store($request);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.vehicle.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $vehicleId
     * @return \Illuminate\Http\Response
     */
    public function show($vehicleId)
    {
        return response()->json($this->repo->show($vehicleId));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $vehicleId
     * @return View
     */
    public function edit($vehicleId)
    {
        $vehicle = $this->repo->find($vehicleId);

        return view('backend.vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $vehicleId
     * @return Redirect
     */
    public function update(Request $request, $vehicleId)
    {
        $rs = $this->repo->update($request, $vehicleId);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.vehicle.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $vehicleId
     * @return \Illuminate\Http\Response
     */
    public function destroy($vehicleId)
    {
        $rs = $this->repo->destroy($vehicleId);
        toast($rs['msg'], $rs['stt']);
        return back();
        // if ($rs['stt'] == 'error') {
        //     return response()->json($rs, 500);
        // }

        // return response()->json($rs);
    }
}
