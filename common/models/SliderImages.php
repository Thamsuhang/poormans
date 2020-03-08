<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider_images".
 *
 * @property integer $id
 * @property integer $page_id
 * @property string $image
 * @property string $link
 */
class SliderImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'image', 'link'], 'required'],
            [['page_id'], 'integer'],
            [['image'], 'string', 'max' => 40],
            [['link'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'image' => 'Image',
            'link' => 'Link',
        ];
    }
}
