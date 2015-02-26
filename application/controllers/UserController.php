<?php

namespace application\controllers;

use app\components\BaseController;
use common\models\User;
use common\models\UserSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class UserController extends BaseController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['profile', 'index', 'create', 'update', 'search', 'sendemail'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionProfile() {
        $model = $this->findModel(Yii::$app->user->identity->id);

        if ($model->load(Yii::$app->request->post())) {
            $model->setAttributes(Yii::$app->request->post());
            $valid = $model->validate();
            if ($valid) {
                $model->updateProfile();
                Yii::$app->getSession()->setFlash('success', 'Changes saved successfully');
                return $this->refresh();
            }
        }

        return $this->render('profile', ['model' => $model]);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionSearch() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $valid = $model->validate();
            if ($valid) {
                $model->createUser(false);
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $valid = $model->validate();
            if ($valid) {
                $model->createUser(false);
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSendemail() {
        echo \Yii::$app->params['supportEmail'];
        $mail = \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => ''])
//                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                        ->setFrom('prakash.paramanandam@arkinfotec.com')
                        ->setTo('prakash.paramanandam@arkinfotec.com')
                        ->setSubject('Password reset for ' . \Yii::$app->name)
                        ->send();
        
        if($mail){
            echo 'yes';
        }else{
            echo 'no';
        }
        exit;
    }

}
