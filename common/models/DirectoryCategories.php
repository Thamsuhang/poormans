<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "directory_categories".
 *
 * @property integer $id
 * @property string $type
 * @property integer $parent
 */
class DirectoryCategories extends \common\models\generated\DirectoryCategories
{


    public function rules()
    {
        return [
            [['type'], 'filter', 'filter' => 'strtolower'],
            [['type'], 'filter', 'filter' => 'trim'],
        ];
    }

    public function getParent() {
        return $this->hasOne(DirectoryCategories::className(), ['id' => 'parent']);
    }
}
