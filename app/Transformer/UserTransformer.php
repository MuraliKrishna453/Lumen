<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\User;
class UserTransformer extends TransformerAbstract{


    function transform(User $user){
        return [
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
        ];
    }

}