<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%configuration_web}}".
 *
 * @property int $tcw_id
 * @property string $tcw_name
 * @property string $tcw_value
 */
class ConfigurationWeb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%configuration_web}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tcw_name'], 'required'],
            [['tcw_name', 'tcw_value'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tcw_id' => Yii::t('app', 'Tcw ID'),
            'tcw_name' => Yii::t('app', 'Tcw Name'),
            'tcw_value' => Yii::t('app', 'Tcw Value'),
        ];
    }
}
