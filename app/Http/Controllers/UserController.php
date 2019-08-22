<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function editProfile($id){
        $user =$this->userService->findById($id);
        return view('users.update',compact('user'));
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
}
