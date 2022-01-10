<?php

namespace App\Http\Controllers;

use App\Repositories\AboutUs\AboutUsRepositoryInterface;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    private $repo;

    public function __construct(AboutUsRepositoryInterface $aboutRepositoryInterface)
    {
        $this->repo = $aboutRepositoryInterface;
    }

    public function index()
    {
        $about = $this->repo->getAll()->first();

        return view('backend.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $rs = $this->repo->update($request, 1);
        toast($rs['msg'], $rs['stt']);

        return back();
    }
}
