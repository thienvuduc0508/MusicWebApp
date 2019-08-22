<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Services\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;

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
        return redirect()->route('user.index', $id);
    }

    public function changePassword($id)
    {
        $user = $this->userService->findById($id);
        return view('users.changePassword', compact('user'));
    }
    public function updatePassword(Request $request,$id){
        $this->userService->updatePassword($request, $id);
        return redirect()->route('user.index',$id);
    }
}
