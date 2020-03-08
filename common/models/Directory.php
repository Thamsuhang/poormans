<?php

namespace common\models;

class Directory extends \common\models\generated\Directory {


    public function rules() {
        return [
                [['email', 'tags', 'url', 'name'], 'filter', 'filter' => 'strtolower'],
                [['email', 'tags', 'description', 'address', 'url'], 'filter', 'filter' => 'trim'],
        ];
    }

}
