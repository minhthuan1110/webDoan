<?php

namespace App\Http\Controllers;

use App\Repositories\Article\ArticleRepositoryInterface;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $repo;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->repo = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $articles = $this->repo->getAll(['articles.id as id', 'articles.title', 'admins.name as writer', 'articles.display', 'articles.updated_at']);
        return view('backend.article.index', compact('articles'));
    }

    public function indexData()
    {
        return response()->json($this->repo->getAll(['id', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('backend.article.add');
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

        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $articleId
     * @return \Illuminate\Http\Response
     */
    public function show($articleId)
    {
        $article = $this->repo->show($articleId);

        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $articleId
     * @return View
     */
    public function edit($articleId)
    {
        $article = $this->repo->find($articleId);

        return view('backend.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $articleId
     * @return Redirect
     */
    public function update(Request $request, $articleId)
    {
        $rs = $this->repo->update($request, $articleId);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $articleId
     * @return Redirect
     */
    public function destroy($articleId)
    {
        $rs = $this->repo->destroy($articleId);
        toast($rs['msg'], $rs['stt']);
        return back();
        // if ($rs['stt'] == 'error') {
        //     return response()->json($rs, 500);
        // }

        // return response()->json($rs);
    }
}
