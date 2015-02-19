<?php

namespace application\models;

use Yii;

/**
 * This is the model class for table "{{%master_role}}".
 *
 * @property integer $Master_Role_ID
 * @property string $Role_Code
 * @property string $Description
 * @property string $is_Admin
 * @property boolean $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * @property AuthResources[] $authResources
 * @property User[] $users
 */
class MasterRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%master_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Role_Code'], 'required'],
            [['is_Admin'], 'string'],
            [['Active'], 'boolean'],
            [['Created_Date', 'Rowversion'], 'safe'],
            [['Role_Code'], 'string', 'max' => 45],
            [['Description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Master_Role_ID' => 'Master Role ID',
            'Role_Code' => 'Role Code',
            'Description' => 'Role Name',
            'is_Admin' => 'Is  Admin',
            'Active' => 'Active',
            'Created_Date' => 'Created  Date',
            'Rowversion' => 'Rowversion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthResources()
    {
        return $this->hasMany(AuthResources::className(), ['Master_Role_ID' => 'Master_Role_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['role' => 'Master_Role_ID']);
    }
}
