<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render() {
        return response([
            'message' => 'Product does not belong to user'
        ], 403);
    }
}
