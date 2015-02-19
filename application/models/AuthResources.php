<?php

namespace application\models;

use Yii;

/**
 * This is the model class for table "{{%auth_resources}}".
 *
 * @property integer $Master_Resource_ID
 * @property integer $Master_User_ID
 * @property integer $Master_Role_ID
 * @property integer $Master_Module_ID
 * @property integer $Master_Screen_ID
 * @property string $Master_Task_ADD
 * @property string $Master_Task_SEE
 * @property string $Master_Task_UPT
 * @property string $Master_Task_DEL
 * @property boolean $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * @property MasterRole $masterRole
 * @property User $masterUser
 * @property MasterModule $masterModule
 * @property MasterScreen $masterScreen
 */
class AuthResources extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_resources}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Master_User_ID', 'Master_Role_ID', 'Master_Module_ID', 'Master_Screen_ID'], 'integer'],
            [['Master_Module_ID', 'Master_Screen_ID'], 'required'],
            [['Master_Task_ADD', 'Master_Task_SEE', 'Master_Task_UPT', 'Master_Task_DEL'], 'string'],
            [['Active'], 'boolean'],
            [['Created_Date', 'Rowversion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Master_Resource_ID' => 'Master  Resource  ID',
            'Master_User_ID' => 'Master  User  ID',
            'Master_Role_ID' => 'Master  Role  ID',
            'Master_Module_ID' => 'Master  Module  ID',
            'Master_Screen_ID' => 'Master  Screen  ID',
            'Master_Task_ADD' => 'Master  Task  Add',
            'Master_Task_SEE' => 'Master  Task  See',
            'Master_Task_UPT' => 'Master  Task  Upt',
            'Master_Task_DEL' => 'Master  Task  Del',
            'Active' => 'Active',
            'Created_Date' => 'Created  Date',
            'Rowversion' => 'Rowversion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterRole()
    {
        return $this->hasOne(MasterRole::className(), ['Master_Role_ID' => 'Master_Role_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterUser()
    {
        return $this->hasOne(User::className(), ['id' => 'Master_User_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterModule()
    {
        return $this->hasOne(MasterModule::className(), ['Master_Module_ID' => 'Master_Module_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterScreen()
    {
        return $this->hasOne(MasterScreen::className(), ['Master_Screen_ID' => 'Master_Screen_ID']);
    }
}
