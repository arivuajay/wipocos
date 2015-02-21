<?php

namespace application\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use application\models\AuthResources;

/**
 * AuthResourcesSearch represents the model behind the search form about `application\models\AuthResources`.
 */
class AuthResourcesSearch extends AuthResources {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Master_Resource_ID', 'Master_User_ID', 'Master_Role_ID', 'Master_Module_ID', 'Master_Screen_ID'], 'integer'],
            [['Master_Task_ADD', 'Master_Task_SEE', 'Master_Task_UPT', 'Master_Task_DEL', 'Created_Date', 'Rowversion'], 'safe'],
            [['Active'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = AuthResources::find();

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
            'Master_Resource_ID' => $this->Master_Resource_ID,
            'Master_User_ID' => $this->Master_User_ID,
            'Master_Role_ID' => $this->Master_Role_ID,
            'Master_Module_ID' => $this->Master_Module_ID,
            'Master_Screen_ID' => $this->Master_Screen_ID,
            'Active' => $this->Active,
            'Created_Date' => $this->Created_Date,
            'Rowversion' => $this->Rowversion,
        ]);

        $query->andFilterWhere(['like', 'Master_Task_ADD', $this->Master_Task_ADD])
                ->andFilterWhere(['like', 'Master_Task_SEE', $this->Master_Task_SEE])
                ->andFilterWhere(['like', 'Master_Task_UPT', $this->Master_Task_UPT])
                ->andFilterWhere(['like', 'Master_Task_DEL', $this->Master_Task_DEL]);

        return $dataProvider;
    }

}
