<?php

namespace App\Repositories;

use App\Models\Area;
use App\Models\Attribute;
use App\Models\Booking;
use App\Models\Location;
use App\Models\Payment;
use App\Models\Promotion;
use App\Models\Tag;
use App\Models\Tour;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

abstract class RepositoryEloquent implements RepositoryInterface
{
    protected $model;

    protected const STATUS_SUCCESS = 'success';
    protected const STATUS_ERROR = 'error';

    // * cac ham thiet lap Repository
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model for each repository.
     * Declare in specific repository
     */
    abstract public function getModel();

    /**
     * Set model for each repository.
     */
    public function setModel()
    {
        $this->_model = app()->make($this->getModel());
    }

    // ! Cac ham truy van - khai bao ben Interface

    public function query()
    {
        return $this->_model->query();
    }

    /**
     * Get all records.
     */
    public function getAll($columns = ['*'])
    {
        return $this->_model->select($columns)->orderBy('id', 'desc')->get();
    }

    public function find($id)
    {
        return $this->_model->findOrFail($id);
    }

    public function search($column = 'name', $keyword)
    {
        return $this->_model->where($column, 'like', '%' . $keyword . '%')
            ->orderBy($column)->get();
    }

    public function show($id)
    {
        return $this->_model->where('id', $id)->first();
    }

    /**
     * lay ca link mang xa hoi FB, YTB, INSTA ...
     */
    public function getFooterData()
    {
        return DB::table('about')->select('facebook', 'youtube', 'instagram', 'twitter', 'pinterest')->first();
    }

    /**
     * Lay tat ca User
     */
    public function getAllUser()
    {
        return User::all();
    }

    /**
     * Lay thong tin area.
     */
    public function getAllArea()
    {
        return Area::all();
    }

    /**
     * Lay thong tin Location.
     */
    public function getAllLocation()
    {
        return Location::all();
    }

    /**
     * Lay thong tin khuyen mai.
     */
    public function getAllPromotion()
    {
        return Promotion::all();
    }

    /**
     * Lay tat ca Tag.
     */
    public function getAllTag()
    {
        return Tag::all();
    }

    /**
     * Lay tat ca Vehicles.
     */
    public function getAllVehicle()
    {
        return Vehicle::all();
    }

    /**
     * Lấy tất cả Tours.
     */
    public function getAllTour()
    {
        return Tour::all();
    }

    /**
     * Lấy tất cả Payments.
     */
    public function getAllPayment()
    {
        return Payment::all();
    }

    /**
     * Lay id cua cot include.
     */
    public function getIncludeId()
    {
        return Attribute::select('id')->where('name', 'included')->first()->id;
    }

    /**
     * Lay id cua cot not_include.
     */
    public function getNotIncludeId()
    {
        return Attribute::select('id')->where('name', 'not included')->first()->id;
    }

    /**
     * Lay cac dich vu bao gom theo tour (include).
     */
    public function getTourInclude($tourId)
    {
        return Tour::select('values.id', 'values.attribute_id', 'values.tour_id', 'values.value')->join('values', 'tours.id', '=', 'values.tour_id')
            ->where([
                ['values.attribute_id', $this->getIncludeId()],
                ['values.tour_id', $tourId],
            ])->first();
    }

    /**
     * Lay cac dich vu KHONG bao gom theo tour (include).
     */
    public function getTourNotInclude($tourId)
    {
        return Tour::select('values.id', 'values.attribute_id', 'values.tour_id', 'values.value')->join('values', 'tours.id', '=', 'values.tour_id')
            ->where([
                ['values.attribute_id', $this->getNotIncludeId()],
                ['values.tour_id', $tourId],
            ])->first();
    }

    /**
     * Lấy các yêu cầu book với phương thức thanh toán tiền mặt, trạng thái là 0
     */
    public function getBookingRequest()
    {
        $columns = [
            'bookings.id',
            'tours.name as tour_name',
            'bookings.full_name',
            'booking_details.total_slot',
            'booking_details.other_day',
            'bookings.status',
            'bookings.payment_id',
        ];

        return Booking::select($columns)->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')->join('tours', 'booking_details.tour_id', '=', 'tours.id')->where([
            ['bookings.status', '=', 0],
            ['bookings.payment_id', '=', 1],
        ])->get();
    }

    public function getBookingRequestDetail($bookingId)
    {
        $columns = [
            'bookings.id as booking_id',
            'bookings.code as booking_code',
            'bookings.promotion_id',
            'bookings.full_name',
            'bookings.phone',
            'bookings.email',
            'bookings.address',
            'bookings.note',
            'bookings.status',
            'bookings.created_at',
            'tours.id as tour_id',
            'tours.name as tour_name',
            'tours.code as tour_code',
            'tours.slot as tour_slot',
            'tours.other_day',
            'booking_details.other_day as day',
            'booking_details.adult_slot',
            'booking_details.adult_price',
            'booking_details.youth_slot',
            'booking_details.youth_price',
            'booking_details.child_slot',
            'booking_details.child_price',
            'booking_details.baby_slot',
            'booking_details.baby_price',
            'booking_details.total_slot',
            'booking_details.total_price',
        ];

        return Booking::select($columns)
            ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
            ->join('tours', 'booking_details.tour_id', '=', 'tours.id')
            ->where('bookings.id', $bookingId)->first();
    }

    // ? RESOURCE
    /**
     * Store data to database
     *
     * @param Request $request
     *
     * @return Array
     */
    public function store($request)
    {
        try {
            // dd($request->all());
            $this->_model->create($request->all());
            return [
                'title' => __('Done!'),
                'msg' => __('Save successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Throwable $th) {
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Save failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    /**
     * Update records in database
     *
     * @param Request $request
     * @param $id
     *
     * @return Array
     */
    public function update($request, $id)
    {
        try {
            // dd($request->all());
            $result = $this->find($id);
            if ($result) {
                $result->update($request->all());

                return [
                    'title' => __('Done!'),
                    'msg' => __('Update successfully.'),
                    'stt' => self::STATUS_SUCCESS,
                ];
            }
        } catch (\Exception $e) {
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Update failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    /**
     * update password for my admin account
     */
    public function updatePassword($request, $id)
    {
        try {
            // Validate
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:6',
                'new_password' => 'required|min:6',
                're_new_password' => 'required|min:6',
            ], [
                'password.required' => __('password.required'),
                'password.min' => __('password.min', ['min' => 6]),
                'new_password.required' => __('password.new.required'),
                'new_password.min' => __('password.new.min', ['min' => 6]),
                're_new_password.required' => __('password.renew.required'),
                're_new_password.min' => __('password.renew.min', ['min' => 6]),
            ]);

            if ($validator->fails()) {
                return [
                    'title' => __('Oops! An error has occurred.'),
                    'msg' => __('password.validate_failed'),
                    'stt' => self::STATUS_ERROR,
                    'error_messages' => $validator->messages()->all(),
                ];
            }

            $pwd = $request->password;
            $newPwd = $request->new_password;
            $rePwd = $request->re_new_password;
            $currentPwd = $this->find($id)->first()->password;

            if (!Hash::check($pwd, $currentPwd)) {
                return [
                    'title' => __('Oops! An error has occurred.'),
                    'msg' => __('password.incorrect'),
                    'stt' => self::STATUS_ERROR,
                ];
            }

            if (strcmp($newPwd, $rePwd) != 0) {
                return [
                    'title' => __('Oops! An error has occurred.'),
                    'msg' => __('password.renew.incorrect'),
                    'stt' => self::STATUS_ERROR,
                ];
            }

            $this->find($id)->update([
                'password' => Hash::make($newPwd),
            ]);

            return [
                'title' => __('Done!'),
                'msg' => __('password.change_success'),
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

    /*
    |---------------------------------------------------------------------------
    | Xu li du lieu tu Editor.
    |---------------------------------------------------------------------------
     */
    public function getDataFromEditor($dataEditor, $oldData = null)
    {
        // tat loi libxml
        libxml_use_internal_errors(true);

        // khai bao bien result ban dau la null
        $result = null;
        $imagePathInEditor = $this->_model->imagePathInEditor;

        if (!empty($dataEditor)) {
            // tao doi tuong DOM duyet dataEditor moi submit
            $dom = new \DOMDocument();
            $dom->loadHTML(mb_convert_encoding($dataEditor, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            $src = [];

            foreach ($images as $key => $img) {
                // lay du lieu base64 tu thuoc tinh src
                $dataImg = $img->getAttribute('src');
                // dua du lieu base64 ben tren vao cuoi mang $src
                array_push($src, $dataImg);

                // Tao Anh Moi
                // neu trong src ton tai chuoi base64
                if (strpos($dataImg, 'base64') !== false) {
                    // list($type, $data) = explode(';', $dataImg);
                    list($type, $data) = explode(',', $dataImg);
                    // giai ma base64
                    $dt = base64_decode($data);

                    // tao thu muc neu chua co
                    if (!is_dir(public_path($imagePathInEditor))) {
                        mkdir(public_path($imagePathInEditor), 0777, true);
                    }

                    // tao ten anh
                    $imageName = $imagePathInEditor . time() . '_' . $key . '.png';
                    $publicPath = public_path() . $imageName;
                    // tao anh moi (base64 chuyen thanh png)
                    file_put_contents($publicPath, $dt);

                    // xoa src cu la base64
                    $img->removeAttribute('src');
                    // dat src moi la duong dan anh vua tao
                    $img->setAttribute('src', $imageName);
                }
            }

            $result = $dom->saveHTML();
        }

        // Xoa anh cu (da xoa tren editor)
        if (!empty($oldData)) {
            // tao doi tuong DOM tu dataEditor cu trong CSDL
            $domOld = new \DOMDocument();
            $domOld->loadHTML(mb_convert_encoding($oldData, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imagesOld = $domOld->getElementsByTagName('img');
            $srcOld = [];

            foreach ($imagesOld as $key => $img) {
                array_push($srcOld, $img->getAttribute('src'));
            }
            // tao mang luu nhung link cu khong co trong dataEditor moi submit
            $srcDelete = array_diff($srcOld, $src);

            // xoa nhung link cu khong dung
            foreach ($srcDelete as $key => $value) {
                $this->deleteImage($value);
            }
        }

        return $result;
    }

    /*
    |---------------------------------------------------------------------------
    | Xử lí hình ảnh.
    |---------------------------------------------------------------------------
    */

    /**
     * ! Upload image.
     *
     * @return string $imagePath
     */
    public function uploadImage($hasFile, $file, $addPath = '')
    {
        // dd($this->getImageDirectory());
        if ($hasFile) {
            // lay ten goc cua file
            $originFileName = $file->getClientOriginalName();

            // lay extension cua file
            $extension = $file->getClientOriginalExtension();

            // lay ten file khong co extension
            $fileNameWithoutExtension = substr($originFileName, 0, strlen($originFileName)
                - (strlen($extension) + 1));

            // create unique file name de khong bi trung
            $fileName = $fileNameWithoutExtension . uniqid('_') . '.' . $extension;

            // tien hanh upload
            // $file->store($this->getImageDirectory());
            $file->move($this->getImageDirectory($addPath), $fileName);

            return '/images/' . $this->_model->imagePath . $addPath . $fileName;
        } else {
            return null;
        }
    }

    /**
     * ! Update image (xoa anh cu, upload anh moi).
     *
     * @return string $imagePath
     */
    public function updateImagePath($id, $hasFile, $file, $imageField = 'image', $addPath = '')
    {
        $oldImagePath = $this->getOldImagePath($id, $imageField);
        if ($hasFile) {
            if ($oldImagePath) {
                $this->deleteImage($oldImagePath);
            }
            return $this->uploadImage($hasFile, $file, $addPath);
        } else {
            return $oldImagePath;
        }
    }

    /**
     * ! Xoa anh.
     */
    public function deleteImage($path)
    {
        // dd($path);
        if (File::exists(public_path($path))) {
            // lay ten file tu duong dan
            File::delete(public_path($path)); // xoa anh goc
            $tmpArr = explode('/', $path); // tach thanh 1 mang phan cach boi dau '/'
            $fileName = array_pop($tmpArr); // lay phan tu cuoi cua mang -> tuc la ten file
            $thumbnailPath = $this->getThumbnailDirectory() . $fileName; // lay duong dan thumbnail
            File::delete($thumbnailPath); // xoa anh thumbnail
        }
    }

    /**
     * lay duong dan cu trong database
     */
    public function getOldImagePath($id, $imageField)
    {
        return $this->find($id)->$imageField;
    }

    /**
     * Lay $imagePath ben Model.
     */
    public function getImageDirectory($addPath = '')
    {
        $path = '/images/' . $this->_model->imagePath . $addPath;
        if (!is_dir(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }
        return public_path($path);
    }

    /**
     * Lay duong dan cua cac anh thumbnail ben Model.
     */
    public function getThumbnailDirectory()
    {
        if (!is_dir(public_path($this->_model->thumbnailPath))) {
            mkdir(public_path($this->_model->thumbnailPath), 0777, true);
        }
        return public_path($this->_model->thumbnailPath);
    }

    /**
     * Fly Resize.
     */
    public function flyResize($model, $size, $imagePath)
    {
        $imageFullPath = public_path($imagePath);
        $sizes = config('image.sizes');

        if (!file_exists($imageFullPath) || !isset($sizes[$size])) {
            abort(404);
        }

        $fileName = array_pop(explode('/', $imagePath)); // lay ten file
        $savePath = public_path('/' . 'images/' . $model . '/' . $size . '/' . $fileName);
        $saveDir = dirname($savePath);
        if (!is_dir($saveDir)) {
            mkdir($saveDir, 0777, true);
        }
        list($width, $height) = $sizes[$size];
        $image = Image::make($imageFullPath)->fit($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($savePath);

        return $image->response();
    }
}
