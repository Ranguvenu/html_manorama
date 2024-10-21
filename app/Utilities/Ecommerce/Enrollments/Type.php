<?php

namespace App\Utilities\Ecommerce\Enrollments;

use App\Contracts\FilterContract;

class Type implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        if ($value) {
            $this->query->where('enrollment_type',  $value);
        }
    }
}
