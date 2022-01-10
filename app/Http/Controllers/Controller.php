<?php

namespace App\Http\Controllers;

use App\Repositories\RepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected const STATUS_SUCCESS = 'success';
    protected const STATUS_ERROR = 'error';

    // public function footerData()
    // {
    //     return response()->json($this->repo->getFooterData());
    // }

    public function changeLanguage(Request $request, $language)
    {
        $request->session()->put('website_language', $language);

        return redirect()->back();
    }

    public function generateCode($length = 10)
    {
        $permittedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomChar = $permittedChars[mt_rand(0, strlen($permittedChars) - 1)];
            $randomString .= $randomChar;
        }
        return $randomString;
    }

    // public function flyResize($model, $size, $imagePath)
    // {
    //     return $this->repo->flyResize($model, $size, $imagePath);
    // }

    public function socialElement()
    {
        $contact = DB::table('contacts')->get();
        $about = DB::table('about')->first();
        // dd(empty($contact[3]->address));
        $data = [
            'email' => $contact[0]->email,
            'phone' => preg_replace('~(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{2})[^\d]{0,7}(\d{2})~', '$1 $2 $3 $4', $contact[0]->phone),
            'address' => $contact[0]->address,
            'facebook' => $about->facebook,
            'youtube' => $about->youtube,
            'instagram' => $about->instagram,
            'twitter' => $about->twitter,
            'pinterest' => $about->pinterest,

            // 'email2' => $contact[1]->email,
            // 'phone2' => $contact[1]->phone,
            'address2' => isset($contact[1]->address) ? $contact[1]->address : '',
            // 'email3' => $contact[2]->email,
            // 'phone3' => $contact[2]->phone,
            'address3' => isset($contact[2]->address) ? $contact[2]->address : '',
            // 'email4' => $contact[3]->email,
            // 'phone4' => $contact[3]->phone,
            'address4' => isset($contact[3]->address) ? $contact[3]->address : '',
        ];

        return response()->json($data);
    }
}
