<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%email_template}}".
 *
 * @property int $tet_id
 * @property string $tet_subject
 * @property string $tet_body
 * @property int $first_user
 * @property int $last_user
 * @property string $first_ip
 * @property string $last_ip
 * @property string $first_update
 * @property string $last_update
 */
class EmailTemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%email_template}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tet_subject', 'tet_body', 'first_user', 'last_user', 'first_ip', 'last_ip', 'first_update', 'last_update'], 'required'],
            [['tet_body'], 'string'],
            [['first_user', 'last_user'], 'integer'],
            [['first_update', 'last_update'], 'safe'],
            [['tet_subject'], 'string', 'max' => 20],
            [['first_ip', 'last_ip'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tet_id' => Yii::t('app', 'Tet ID'),
            'tet_subject' => Yii::t('app', 'Tet Subject'),
            'tet_body' => Yii::t('app', 'Tet Body'),
            'first_user' => Yii::t('app', 'First User'),
            'last_user' => Yii::t('app', 'Last User'),
            'first_ip' => Yii::t('app', 'First Ip'),
            'last_ip' => Yii::t('app', 'Last Ip'),
            'first_update' => Yii::t('app', 'First Update'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }
}
