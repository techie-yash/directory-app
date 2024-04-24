<?php

namespace App\Traits;
use App\Models\Customer;

trait AuthHelperTrait
{
    public function getAuthenticatedUserId()
    {
        return auth()->guard('customers')->id();
    }

    public function getAuthenticatedUser()
    {
        return auth()->guard('customers')->user();
    }

}