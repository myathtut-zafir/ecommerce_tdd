<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    // You will add update, delete policies here as well
    public function update(User $user, Product $product)
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Product $product)
    {
        return $user->role === 'admin';
    }

    // Allow all actions for admin, bypass checks
    public function before(User $user, $ability)
    {
        if ($user->role === 'admin') {
            return true;
        }
        return null;
    }
}
