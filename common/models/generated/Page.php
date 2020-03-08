<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property string $featured_image
 * @property string $action
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'title', 'description', 'slug', 'action'], 'required'],
            [['description'], 'string'],
            [['name', 'title', 'slug'], 'string', 'max' => 100],
            [['featured_image', 'action'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'description' => 'Description',
            'slug' => 'Slug',
            'featured_image' => 'Featured Image',
            'action' => 'Action',
        ];
    }
}
