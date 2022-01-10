<?php

namespace App\Repositories\Article;

use App\Models\Article;
use App\Repositories\RepositoryEloquent;

class ArticleRepositoryEloquent extends RepositoryEloquent implements ArticleRepositoryInterface
{
    protected $path = '/storage/images/articles/';

    public function getModel()
    {
        return \App\Models\Article::class;
    }

    public function getAll($columns = ['*'])
    {
        return $this->_model->select($columns)->join('admins', 'articles.admin_id', '=', 'admins.id')->orderBy('id', 'desc')->get();
    }

    /**
     * Luu bai viet.
     */
    public function store($request)
    {
        try {
            $image = $this->uploadImage($request->hasFile('image'), $request->file('image'));
            $content = $this->getDataFromEditor($request->content);

            $article = new Article();
            $article->admin_id = $request->admin_id;
            $article->title = $request->title;
            if ($image) {
                $article->image_path = $image;
            }
            $article->content = $content;
            $article->display = $request->display;
            $article->created_at = now();
            $article->updated_at = now();
            $article->save();

            return [
                'msg' => __('Save successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            return [
                'msg' => __('Save failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    /**
     * Cap nhat bai viet.
     */
    public function update($request, $articleId)
    {
        try {
            $image = $this->updateImagePath($articleId, $request->hasFile('image'), $request->file('image'), 'image_path');
            $content = $this->getDataFromEditor($request->content, $this->find($articleId)->content);

            $article = $this->find($articleId);
            $article->title = $request->title;
            if ($image) {
                $article->image_path = $image;
            }
            $article->content = $content;
            $article->display = $request->display;
            $article->updated_at = now();
            $article->save();

            return [
                'msg' => __('Update successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Throwable $th) {
            // throw $th;
            return [
                'msg' => __('Update failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }
}
