<?php

namespace App\Utilities\Content\StudyMaterials;

use App\Contracts\FilterContract;

class Board implements FilterContract {

    protected $query;

    public function __construct($query) {
        $this->query = $query;
    }

    public function handle($value): void {
        if($value){
            // Your filtering logic goes here
            $this->query->where('board_id', $value);
        }
    }

}