<?php

namespace application\models;

use Yii;

/**
 * This is the model class for table "{{%master_module}}".
 *
 * @property integer $Master_Module_ID
 * @property string $Module_Code
 * @property string $Description
 * @property boolean $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * @property MasterAuthResources[] $masterAuthResources
 * @property MasterScreen[] $masterScreens
 */
class MasterModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%master_module}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Module_Code'], 'required'],
            [['Active'], 'boolean'],
            [['Created_Date', 'Rowversion'], 'safe'],
            [['Module_Code'], 'string', 'max' => 45],
            [['Description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Master_Module_ID' => 'Master  Module  ID',
            'Module_Code' => 'Module  Code',
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
        return $this->hasMany(MasterAuthResources::className(), ['Master_Module_ID' => 'Master_Module_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterScreens()
    {
        return $this->hasMany(MasterScreen::className(), ['Module_ID' => 'Master_Module_ID']);
    }
}
