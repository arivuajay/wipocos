<?php

namespace application\models;

use Yii;

/**
 * This is the model class for table "{{%master_screen}}".
 *
 * @property integer $Master_Screen_ID
 * @property integer $Module_ID
 * @property string $Screen_code
 * @property string $Description
 * @property boolean $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * @property MasterAuthResources[] $masterAuthResources
 * @property MasterModule $module
 */
class MasterScreen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%master_screen}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Module_ID', 'Screen_code'], 'required'],
            [['Module_ID'], 'integer'],
            [['Active'], 'boolean'],
            [['Created_Date', 'Rowversion'], 'safe'],
            [['Screen_code'], 'string', 'max' => 45],
            [['Description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Master_Screen_ID' => 'Master  Screen  ID',
            'Module_ID' => 'Module  ID',
            'Screen_code' => 'Screen Code',
            'Description' => 'Description',
            'Active' => 'Active',
            'Created_Date' => 'Created  Date',
            'Rowversion' => 'Rowversion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterAuthResources()
    {
        return $this->hasMany(MasterAuthResources::className(), ['Master_Screen_ID' => 'Master_Screen_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(MasterModule::className(), ['Master_Module_ID' => 'Module_ID']);
    }
}
