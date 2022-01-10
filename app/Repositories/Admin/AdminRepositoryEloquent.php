<?php

namespace App\Repositories\Admin;

use App\Repositories\RepositoryEloquent;
use Illuminate\Support\Facades\Hash;

class AdminRepositoryEloquent extends RepositoryEloquent implements AdminRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Admin::class;
    }

    /**
     * Tao admin account moi.
     */
    public function store($request)
    {
        try {
            $this->_model->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(123456),
            ]);

            return [
                'title' => __('Done!'),
                'msg' => __('Add successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Throwable $th) {
            return [
                'title' => __('Oops! An error has occurred.'),
                'msg' => __('Add failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    /**
     * Block tai khoan admin
     */
    public function block($adminId)
    {
        try {
            $this->_model->findOrFail($adminId)->update(['status' => 0]);
            return [
                'title' => __('Done!'),
                'msg' => __('Update successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            return [
                'title' => __('Oops! An error has occurred.'),
                'msg' => __('Update failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    /**
     * Unblock tai khoan admin
     */
    public function unblock($adminId)
    {
        try {
            $this->_model->findOrFail($adminId)->update(['status' => 1]);
            return [
                'title' => __('Done!'),
                'msg' => __('Update successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            return [
                'title' => __('Oops! An error has occurred.'),
                'msg' => __('Update failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    /*
    |---------------------------------------------------------------------------
    | Update thong tin cua ban than admin (update my admin-profile).
    |---------------------------------------------------------------------------
     */
    public function updateProfile($request, $myAdminId)
    {
        try {
            $path = $this->updateImagePath($myAdminId, $request->hasFile('image'), $request->file('image'), 'avatar_image_path', $myAdminId . '/');
            $this->find($myAdminId)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'avatar_image_path' => $path,
            ]);

            return [
                'title' => __('Done!'),
                'msg' => __('Update successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            return [
                'title' => __('Oops! An error has occurred.'),
                'msg' => __('Update failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }
}
