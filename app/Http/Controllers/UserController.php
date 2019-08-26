<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function editProfile($id)
    {
        $user = $this->userService->findById($id);
        return view('users.updateProfile', compact('user'));
    }

    public function index($id)
    {
        $user = $this->userService->findById($id);
        return view('users.showProfile', compact('user'));
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->back()->with("success","Cập nhật thông tin thành công !");
//        return redirect()->route('user.index', $id);
    }

    public function changePassword($id)
    {
        $user = $this->userService->findById($id);
        return view('users.changePassword', compact('user'));
    }
    public function updatePassword(ChangePasswordRequest $request,$id){
        $user = $this->userService->findById($id);

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

        $this->userService->updatePassword($request, $id);
//        return redirect()->route('user.index',$id);
        return redirect()->back()->with("success","Thay đổi mật khẩu thành công !");
    }
}
