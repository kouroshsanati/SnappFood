<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\User;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user)
    {
        $cart_id = request()->get('cart_id');
        $cart = Cart::query()->find($cart_id);
        return $user->carts->contains($cart) && $cart->comments->first() === null && $cart->is_paid === 1;
    }

}
