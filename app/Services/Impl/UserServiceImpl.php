<?php
namespace App\Services\Impl;

use App\Repositories\UserRepositoryInterface;
use App\Services\Impl\ServiceImpl;
use App\Services\UserServiceInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl extends ServiceImpl implements UserServiceInterface
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function update($request, $id)
    {
        $profileUser = $this->repository->findById($id);
        $profileUser->name = $request->name;
        $profileUser->gender = $request->gender;
        $profileUser->dob = $request->dob;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images','public');
            $profileUser->image = $path;
        }
        $this->repository->update($profileUser);

    }
    public function changePassword($id)
    {
        return $this->repository->findById($id);
    }

    public function updatePassword($request, $id)
    {
        $user = $this->repository->findById($id);

        if (!(Hash::check($request->get('current_password'), $user->password))) {

            return redirect()->back()->with("error","Your current password does not matches with
             the password you provided.
             Please try again.");
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your 
            current password. Please choose a different password.");
        }

        $user->password = Hash::make($request->get('new_password'));
        $this->repository->update($user);
    }
}
