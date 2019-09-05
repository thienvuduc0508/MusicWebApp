<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function editProfile()
    {
        $user = $this->userService->findById(Auth::id());
        return view('users.updateProfile', compact('user'));
    }

    public function index()
    {
        $user = $this->userService->findById(Auth::id());
        return view('users.showProfile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $this->userService->update($request, Auth::id());
        Session::flash('success', 'Cập nhật thông tin thành công');
       return redirect()->route('user.index');
    }

    public function changePassword()
    {
        $user = $this->userService->findById(Auth::id());
        return view('users.changePassword', compact('user'));
    }
    public function updatePassword(ChangePasswordRequest $request){
        $user = $this->userService->findById(Auth::id());

        if (!(Hash::check($request->get('current_password'), $user->password))) {

            return redirect()->back()->with("error","Mật khẩu hiện tại của bạn không khớp với
             mật khẩu bạn đã cung cấp.
             Vui lòng thử lại.");
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return redirect()->back()->with("error","Mật khẩu mới không thể giống với mật khẩu hiện tại
             của bạn
            . Vui lòng chọn một mật khẩu khác nhau.");
        }

        $this->userService->updatePassword($request, Auth::id());
        Session::flash('success', 'Thay đổi mật khẩu thành công !');
        return redirect()->route('user.index');
    }

}
