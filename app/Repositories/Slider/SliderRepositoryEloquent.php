<?php

namespace App\Repositories\Slider;

use App\Models\Slider;
use App\Repositories\RepositoryEloquent;

class SliderRepositoryEloquent extends RepositoryEloquent implements SliderRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Slider::class;
    }

    public function storeSlider($request, $image)
    {
        try {
            $slider = new Slider();
            $slider->admin_id = $request->admin_id;
            $slider->title = $request->title;
            $slider->content = $request->content;
            if (!empty($image)) {
                $slider->image_path = $image;
            }
            $slider->display = $request->display;
            $slider->save();

            return [
                'title' => __('Done!'),
                'msg' => __('Save successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            //throw $th;
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Save failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    public function updateSlider($sliderId, $request, $image)
    {
        try {
            $slider = $this->find($sliderId);
            $slider->title = $request->title;
            if ($image) {
                $slider->image_path = $image;
            }
            $slider->content = $request->content;
            $slider->updated_at = now();
            $slider->save();

            return [
                'title' => __('Done!'),
                'msg' => __('Update successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Throwable $th) {
            // throw $th;
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Update failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    /**
     * Delete records in database.
     *
     * @param $id
     *
     * @return Array
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
