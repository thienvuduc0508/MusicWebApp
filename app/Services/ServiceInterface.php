<?php


namespace App\Services;


interface ServiceInterface
{
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request,$id);
    public function destroy($id);

}
