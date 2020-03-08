<?php

namespace common\models;

use Yii;


class Message extends \common\models\generated\Message
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'subject', 'message', 'created_on'], 'required'],
            [['message'], 'string'],
            [['is_read'], 'integer'],
            [['created_on'], 'safe'],
            [['name', 'subject'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'subject' => 'Subject',
            'message' => 'Message',
            'is_read' => 'Is Read',
            'created_on' => 'Created On',
        ];
    }
}
