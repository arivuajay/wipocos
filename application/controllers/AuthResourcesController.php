<?php

namespace application\controllers;

use application\models\AuthResources;
use application\models\AuthResourcesSearch;
use application\models\MasterScreen;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AuthResourcesController implements the CRUD actions for AuthResources model.
 */
class AuthResourcesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['role', 'get-screens-by-module', 'user'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionRole($rid = null) {
        $model = new AuthResources();
        if($rid)
            $model->Master_Role_ID = $rid;

        return $this->render('role_base',['model' => $model]);
    }
    
    public function actionUser($uid = null) {
        $model = new AuthResources();
        if($uid)
            $model->Master_User_ID = $uid;

        return $this->render('user_base',['model' => $model]);
    }

    /**
     * Lists all AuthResources models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthResourcesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthResources model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthResources model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthResources();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Master_Resource_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthResources model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Master_Resource_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthResources model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthResources model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AuthResources the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthResources::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetScreensByModule() {
        $mid = $id = $type = '';
        if($_GET['mid'] && $_GET['id'] && $_GET['type']){
            $mid = $_GET['mid'];
            $id = $_GET['id'];
            $type = $_GET['type'];
        }
        $model = new AuthResources();
        $masters = MasterScreen::find()->where('Module_ID = :mid', [':mid' => $mid])->all();
        if($type == 'role'){
            $exist_resources = AuthResources::find()->joinWith(['masterScreen'])->where('Master_Module_ID = :mid And Master_Role_ID = :rid', [':mid' => $mid, ':rid' => $id])->all();
        }elseif ($type == 'user') {
            $exist_resources = AuthResources::find()->joinWith(['masterScreen'])->where('Master_Module_ID = :mid And Master_User_ID = :uid', [':mid' => $mid, ':uid' => $id])->all();
        }

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $valid = true;
            foreach ($post['AuthResources'] as $data) {
                $model = empty($exist_resources) ? new AuthResources : $this->findModel($data['Master_Resource_ID']);
                $model->setAttributes($data);
                $valid = $model->save() && $valid;
            }
            if($valid){
                Yii::$app->getSession()->setFlash('success', 'Changes saved successfully');
                $action = isset($data['Master_User_ID']) ? 'user' : 'role';
                return $this->redirect([$action.'/index']);
            }
        } else {
            return $this->renderPartial('_screen_by_module', [
                    'masters' => $masters,
                    'exist_resources' => $exist_resources,
                    'model' => $model,
                    'id' => $id,
                    'type' => $type
            ]);
        }
    }
}
