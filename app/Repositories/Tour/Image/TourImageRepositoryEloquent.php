<?php

namespace App\Repositories\Tour\Image;

use App\Models\TourImage;
use App\Repositories\RepositoryEloquent;

class TourImageRepositoryEloquent extends RepositoryEloquent implements TourImageRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\TourImage::class;
    }

    /**
     * Upload (multi image) va luu vao DB.
     */
    public function store($request)
    {
        try {
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $file->extension();
                    $path = $file->move($this->getImageDirectory() . $request->tour_id, $name);
                    $this->_model->create([
                        'tour_id' => $request->tour_id,
                        'image_path' => $path,
                    ]);
                }
            }

            return [
                'title' => __('Done!'),
                'msg' => __('Add successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Add failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    /**
     * Xoa anh va record trong DB.
     */
    public function destroy($id)
    {
        try {
            $result = $this->find($id);
            if ($result) {
                $this->deleteImage($result->image_path);
                $result->delete();

                return [
                    'title' => __('Done!'),
                    'msg' => __('Delete successfully.'),
                    'stt' => self::STATUS_SUCCESS,
                ];
            }
        } catch (\Exception $e) {
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Delete failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }
}
