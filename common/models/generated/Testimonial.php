<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "testimonial".
 *
 * @property int $id
 * @property string $client
 * @property string $company
 * @property string $position
 * @property string $quote
 * @property int $is_active
 * @property string $created_on
 * @property int $created_by
 */
class Testimonial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testimonial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client', 'created_by'], 'required'],
            [['quote'], 'string'],
            [['is_active', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['client', 'company', 'position'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client' => 'Client',
            'company' => 'Company',
            'position' => 'Position',
            'quote' => 'Quote',
            'is_active' => 'Is Active',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
