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
        $returnUrl = Yii::app()->getModule('user')->returnUrl;
        Yii::trace(__METHOD__ . " (" . __LINE__ . "): returnUrl='$returnUrl'", 'user');
        $returnUrl = Yii::app()->user->getReturnUrl(empty($returnUrl) ? null : $returnUrl);
        Yii::trace(__METHOD__ . " (" . __LINE__ . "): returnUrl='$returnUrl'", 'user');
        $this->redirect($returnUrl);

//        if (isset(Yii::app()->user->returnUrl) && !empty(Yii::app()->user->returnUrl)) {
//            Yii::trace(__METHOD__ . " (" . __LINE__ . "): redirecting to Yii::app()->user->returnUrl ('".Yii::app()->user->returnUrl."'", 'user');
//            $this->redirect(Yii::app()->user->returnUrl);
//        } else if (isset(Yii::app()->controller->module->returnUrl) && !empty(Yii::app()->controller->module->returnUrl)) {
//            Yii::trace(__METHOD__ . " (" . __LINE__ . "): redirecting to Yii::app()->controller->module->returnUrl ('".Yii::app()->controller->module->returnUrl."'", 'user');
//            $this->redirect(Yii::app()->controller->module->returnUrl);
//        } else {
//            Yii::trace(__METHOD__ . " (" . __LINE__ . "): redirecting to this->redirect('/')", 'user');
//            $this->redirect('/');
//        }
    }

}