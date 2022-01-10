<?php

namespace App\Http\Controllers;

use App\Repositories\Location\LocationRepositoryInterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $repo;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->repo = $locationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $locations = $this->repo->getAll(['locations.id as id', 'locations.name as name', 'locations.created_at', 'areas.name as area', 'areas.domestic']);
        // lay area de cho vao modal create
        $areas = $this->repo->getAllArea();

        return view('backend.location.index', compact('locations', 'areas'));
    }

    public function indexData()
    {
        $columns = ['locations.id as id', 'locations.name as name', 'areas.name as area'];
        // dd($columns);
        return response()->json($this->repo->getAll($columns));
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

        return redirect()->route('admin.location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $locationId
     * @return \Illuminate\Http\Response
     */
    public function show($locationId)
    {
        return response()->json($this->repo->show($locationId));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $locationId
     * @return View
     */
    public function edit($locationId)
    {
        $location = $this->repo->find($locationId);
        $areas = $this->repo->getAllArea();

        return view('backend.location.edit', compact('location', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $locationId
     * @return Redirect
     */
    public function update(Request $request, $locationId)
    {
        $rs = $this->repo->update($request, $locationId);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $locationId
     * @return \Illuminate\Http\Response
     */
    public function destroy($locationId)
    {
        $rs = $this->repo->destroy($locationId);
        toast($rs['msg'], $rs['stt']);
        return back();
        // if ($rs['stt'] == 'error') {
        //     return response()->json($rs, 500);
        // }

        // return response()->json($rs);
    }
}
