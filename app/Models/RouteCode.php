<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteCode extends Model
{
    public function isValid(): bool
    {
        if ($this->valid_until && $this->valid_until < now()) {
            $this->delete();
            return false;
        }
        return true;
    }
}
