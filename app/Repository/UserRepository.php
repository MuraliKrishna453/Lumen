<?php

namespace App\Repository;
use App\User;

class UserRepository{

public function getAll(){
    $users = User::all();
    return $users;
}

public function getById($id){
    $user = User::find($id);
    return $user;
}

public function inserUser($input){
    $user = new User;
    $user->name=$input['name'];
    $user->email=$input['email'];
    $user->passport= \Hash::make($input['passport']);
    $user->save();
}

public function updateUser($input,$id){
    $user = User::find($id);
    $user->name=$input['name'];
    $user->email=$input['email'];
    $user->passport= \Hash::make($input['passport']);
    $user->save();
}

public function deleteUser($id){
    $user = User::find($id)->delete();
}
 
}
