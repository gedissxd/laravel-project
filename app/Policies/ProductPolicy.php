<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;



class ProductPolicy
{
 public function edit(User $user, Product $product){
    return $product->maker->user->is($user);
 }
}
