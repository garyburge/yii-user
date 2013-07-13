<?php

class LoginController extends Controller
{

    public $defaultAction = 'login';

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        if (Yii::app()->user->isGuest) {
            // create login form model
            $model = new UserLogin;

            // if form data available
            if (isset($_POST['UserLogin'])) {
                // copy form data to model
                $model->attributes = $_POST['UserLogin'];
                // validate user input and redirect to previous page if valid
                if ($model->validate()) {
                    $this->lastVisit();
                    $this->redirectToReturnUrl();
                }
            }

            // display the login form
            $this->render('/user/login', array('model'=>$model));

        } else {
            // user already logged in; goto normal return page
            $this->redirectToReturnUrl();
        }
    }

    /**
     * update last visit colum with current date and time
     */
    private function lastVisit()
    {
        $lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
        $lastVisit->lastvisit_at = time();
        $lastVisit->save();
    }

    /**
     * redirect to defined return url
     */
    private function redirectToReturnUrl()
    {
        Yii::trace(__METHOD__ . " (" . __LINE__ . "): Yii::app()->controller->module->returnUrl=".print_r(Yii::app()->controller->module->returnUrl, true), 'user');
        Yii::trace(__METHOD__ . " (" . __LINE__ . "): Yii::app()->user->returnUrl=".print_r(Yii::app()->user->returnUrl, true), 'user');
        if (isset(Yii::app()->controller->module->returnUrl) && !empty(Yii::app()->controller->module->returnUrl)) {
            $this->redirect(Yii::app()->controller->module->returnUrl);
        } else if (isset(Yii::app()->user->returnUrl) && !empty(Yii::app()->user->returnUrl)) {
            $this->redirect(Yii::app()->user->returnUrl);
        } else {
            $this->redirect('/');
        }
    }

}