<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function query();
    public function getAll($columns = ['*']);
    public function find($id);
    public function search($column = 'name', $keyword);
    public function show($id);
    public function getFooterData();
    public function getAllUser();
    public function getAllArea();
    public function getAllLocation();
    public function getAllPromotion();
    public function getAllTag();
    public function getAllVehicle();
    public function getAllTour();
    public function getAllPayment();
    public function getIncludeId();
    public function getNotIncludeId();
    public function getTourInclude($tourId);
    public function getTourNotInclude($tourId);
    public function getBookingRequest();
    public function getBookingRequestDetail($bookingId);
    // resource
    public function store($request);
    public function update($request, $id);
    public function updatePassword($request, $id);
    public function destroy($id);
    // xu li data editor
    public function getDataFromEditor($dataEditor, $oldData = null);
    // xu li anh
    public function uploadImage($hasFile, $file, $addPath = '');
    public function updateImagePath($id, $hasFile, $file, $imageField = 'image', $addPath = '');
    public function deleteImage($path);
    public function getOldImagePath($id, $imageField);
    public function getImageDirectory();
    public function getThumbnailDirectory();
    public function flyResize($model, $size, $imagePath);
}
