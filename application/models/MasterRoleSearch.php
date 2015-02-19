<?php

namespace application\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use application\models\MasterRole;

/**
 * MasterRoleSearch represents the model behind the search form about `application\models\MasterRole`.
 */
class MasterRoleSearch extends MasterRole
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Master_Role_ID'], 'integer'],
            [['Role_Code', 'Description', 'Created_Date', 'Rowversion'], 'safe'],
            [['Active'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MasterRole::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Master_Role_ID' => $this->Master_Role_ID,
            'Active' => $this->Active,
            'Created_Date' => $this->Created_Date,
            'Rowversion' => $this->Rowversion,
        ]);

        $query->andFilterWhere(['like', 'Role_Code', $this->Role_Code])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
}
