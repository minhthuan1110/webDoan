<?php

namespace App\Repositories\Tour\Plan;

use App\Models\Tour;
use App\Models\TourPlan;
use App\Repositories\RepositoryEloquent;

class TourPlanRepositoryEloquent extends RepositoryEloquent implements TourPlanRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\TourPlan::class;
    }

    public function getPlan($tourId)
    {
        $data = $this->_model->where('tour_id', $tourId)->orderBy('day', 'asc')->get();
        // $data['tour_name'] = $this->getTourName($tourId);
        // dd($data[0]['content']);
        return $data;
    }

    public function getTourName($tourId)
    {
        return Tour::select('name')->where('id', $tourId)->first()->name;
    }

    public function store($request)
    {
        try {
            // $data = $request->all();
            // $day = $data['day'];
            // foreach ($day as $key => $value) {
            $this->_model->insert([
                'tour_id' => $request->tour_id,
                'day' => $request->day,
                'content' => $request->content,
                'note' => $request->note,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            // }

            return [
                'title' => __('Done!'),
                'msg' => __('Save successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Save failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    public function update($request, $planId)
    {
        try {
            $data = $request->all();
            // dd(count($data));
            $plan = $this->find($planId)->update([
                'day' => $request->day,
                'content' => $request->content,
                'note' => $request->note,
            ]);

            return [
                'title' => __('Done!'),
                'msg' => __('Save successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Save failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }
}
