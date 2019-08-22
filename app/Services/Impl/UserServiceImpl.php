<?php
namespace App\Services\Impl;

use App\Repositories\UserRepositoryInterface;
use App\Services\Impl\ServiceImpl;
use App\Services\UserServiceInterface;

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
}
