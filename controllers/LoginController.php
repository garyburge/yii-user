<?php

<<<<<<< HEAD
  class LoginController extends Controller {

    public $defaultAction = 'login';

    /**
     * Displays the login page
     */
    public function actionLogin() {
      if (Yii::app()->user->isGuest) {
        $model = new UserLogin;
        // collect user input data
        if (isset($_POST['UserLogin'])) {
          $model->attributes = $_POST['UserLogin'];
          // validate user input and redirect to previous page if valid
          if ($model->validate()) {
            $this->lastVisit();
            $this->redirect(Yii::app()->controller->module->returnUrl);
//            if (Yii::app()->user->returnUrl == '/index.php')
//              $this->redirect(Yii::app()->controller->module->returnUrl);
//            else
//              $this->redirect(Yii::app()->user->returnUrl);
          }
        }
        // display the login form
        $this->render('/user/login', array('model' => $model));
      }
      else
        $this->redirect(Yii::app()->controller->module->returnUrl);
    }

    private function lastVisit() {
      $lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
      $lastVisit->lastvisit = time();
      $lastVisit->save();
    }

  }
=======
class LoginController extends Controller
{
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					$this->lastViset();
					if (Yii::app()->getBaseUrl()."/index.php" === Yii::app()->user->returnUrl)
						$this->redirect(Yii::app()->controller->module->returnUrl);
					else
						$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit_at = date('Y-m-d H:i:s');
		$lastVisit->save();
	}

}
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
