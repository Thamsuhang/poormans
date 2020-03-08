<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "directory_categories".
 *
 * @property int $id
 * @property string $type
 * @property int $parent
 */
class DirectoryCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'directory_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['type'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'parent' => 'Parent',
        ];
    }
}
