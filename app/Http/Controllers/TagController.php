<?php

namespace App\Http\Controllers;

use App\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $repo;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->repo = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $tags = $this->repo->getAll(['id', 'name', 'created_at']);
        return view('backend.tag.index', compact('tags'));
    }

    public function indexData()
    {
        return response()->json($this->repo->getAll(['id', 'name', 'created_at']));
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

        return redirect()->route('admin.tag.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $tagId
     * @return View
     */
    public function edit($tagId)
    {
        $tag = $this->repo->find($tagId);

        return view('backend.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tagId
     * @return Redirect
     */
    public function update(Request $request, $tagId)
    {
        $rs = $this->repo->update($request, $tagId);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $tagId
     * @return Redirect
     */
    public function destroy($tagId)
    {
        $rs = $this->repo->destroy($tagId);
        toast($rs['msg'], $rs['stt']);
        return back();
        // if ($rs['stt'] == 'error') {
        //     return response()->json($rs, 500);
        // }

        // return response()->json($rs);
    }
}
