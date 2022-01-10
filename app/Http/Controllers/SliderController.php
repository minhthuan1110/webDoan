<?php

namespace App\Http\Controllers;

use App\Repositories\Slider\SliderRepositoryInterface;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $repo;

    public function __construct(SliderRepositoryInterface $sliderRepository)
    {
        $this->repo = $sliderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $sliders = $this->repo->getAll(['id', 'title', 'image_path', 'display', 'created_at']);
        return view('backend.slider.index', compact('sliders'));
    }

    public function indexData()
    {
        return response()->json($this->repo->getAll(['id', 'title', 'image_path', 'display', 'created_at']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('backend.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirect
     */
    public function store(Request $request)
    {
        $image = $this->repo->uploadImage($request->hasFile('image'), $request->file('image'));
        $rs = $this->repo->storeSlider($request, $image);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $sliderId
     * @return \Illuminate\Http\Response
     */
    public function show($sliderId)
    {
        $slider = $this->repo->show($sliderId);

        return response()->json($slider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $sliderId
     * @return View
     */
    public function edit($sliderId)
    {
        $slider = $this->repo->find($sliderId);

        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $sliderId
     * @return Redirect
     */
    public function update(Request $request, $sliderId)
    {
        $image = $this->repo->updateImagePath($sliderId, $request->hasFile('image'), $request->file('image'), 'image_path');
        $rs = $this->repo->updateSlider($sliderId, $request, $image);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sliderId
     * @return Redirect
     */
    public function destroy($sliderId)
    {
        $rs = $this->repo->destroy($sliderId);
        toast($rs['msg'], $rs['stt']);
        return back();
        // if ($rs['stt'] == 'error') {
        //     return response()->json($rs, 500);
        // }

        // return response()->json($rs);
    }
}
