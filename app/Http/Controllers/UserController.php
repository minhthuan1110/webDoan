<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    protected $repo;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repo = $userRepository;
    }

    /**
     * Get user id.
     *
     * @return int user_id
     */
    public static function id()
    {
        return Auth::guard('user')->id();
    }

    /*
    |-------------------------------------------------------------------
    | Ham xu li users cho Admin.
    |-------------------------------------------------------------------
    */

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $users = $this->repo->getAll(['id', 'name', 'email', 'avatar_image_path', 'profile_photo_path']);
        // dd($users);

        return view('backend.user.index', compact('users'));
    }

    /**
     * Get view create.
     *
     * @return view
     */
    public function create()
    {
        return view('backend.user.add');
    }

    /**
     * Create new record to DB.
     *
     * @return Redirect
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rs = $this->repo->store($request);
        toast($rs['msg'], $rs['stt']);

        return back();
    }

    /**
     * Get view edit.
     */
    public function edit($userId)
    {
        $user = $this->repo->show($userId);
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update user.
     */
    public function update(Request $request, $userId)
    {
        $rs = $this->repo->update($request, $userId);
        toast($rs['msg'], $rs['stt']);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $user = $this->repo->show($id);

        return view('backend.user.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rs = $this->repo->destroy($this->id());
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.user_index');
    }

    /*
    |-------------------------------------------------------------------
    | Ham xu li users cho Customer, tren trang front.
    |-------------------------------------------------------------------
    */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function profile()
    {
        // dd('loading');
        $user = $this->repo->show($this->id());
        $bookings = $this->repo->getBooking($this->id());

        return view('frontend.user.my_account', compact('user', 'bookings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userUpdate(Request $request)
    {
        // dd($request->has)
        $rs = $this->repo->update($request, $this->id());
        toast($rs['msg'], $rs['stt']);

        return back();
    }

    /**
     * Get view change password
     *
     * @return view
     */
    public function changePassword()
    {
        return view('frontend.user.change_password');
    }

    /**
     * User password update.
     *
     * @param \Illuminate\Http\PasswordRequest  $request
     * @return array
     */
    public function updatePassword(Request $request)
    {
        $rs = $this->repo->updatePassword($request, $this->id());
        if (!empty($rs['error_messages'])) {
            session()->flash('errors', $rs['error_messages']);
        }
        toast($rs['msg'], $rs['stt']);

        return redirect()->back();
    }

    /**
     * Lấy các đơn booking tour của User.
     */
    public function getBooking()
    {
        $bookings = $this->repo->getBooking($this->id());
        // dd($bookings, $this->id());

        return view('frontend.user.my_booking', compact('bookings'));
    }

    /**
     * ! Xu li Notification.
     */
    public function getNotification()
    {
        // $user = \App\Models\User::find(Auth::guard('user')->id())->notifications();
        return response()->json(auth('user')->user()->notifications);
    }

    public function markAsReadAll()
    {
        auth('user')->user()->unreadNotifications->markAsRead();
        return response()->json();
    }

    public function markAsRead($notificationId)
    {
        auth('user')->user()->unreadNotifications->where('id', $notificationId)->markAsRead();
        return response()->json();
    }

    public function deleteAllNotification()
    {
        auth('user')->user()->notifications->delete();
        return response()->json();
    }

    public function deleteNotification($notificationId)
    {
        auth('user')->user()->notifications->where('id', $notificationId)->delete();
        return response()->json();
    }
}
