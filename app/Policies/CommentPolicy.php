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

        // Check if the user owns the cart, the cart has no comments, and is_paid is 1
        $isAuthorized = $user->carts->contains($cart) && $cart->comments->isEmpty() && $cart->is_paid === 1;

        return $isAuthorized;
    }

}
