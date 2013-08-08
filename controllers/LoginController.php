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
     * Redirect to defined return url.
     *     1. UserModule::returnUrl
     *     2. CWebUser::returnUrl
     *     3. Root of the application ('/')
     */
    private function redirectToReturnUrl()
    {
        $returnUrl = Yii::app()->getModule('user')->returnUrl;
        $returnUrl = Yii::app()->user->getReturnUrl(empty($returnUrl) ? null : $returnUrl);
        $this->redirect($returnUrl);
    }

}