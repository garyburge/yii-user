<?php

class ActivationController extends Controller
{
	public $defaultAction = 'activation';

<<<<<<< HEAD

=======
	
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
	/**
	 * Activation user account
	 */
	public function actionActivation () {
		$email = $_GET['email'];
<<<<<<< HEAD
		$activeKey = $_GET['activeKey'];
		if ($email&&$activeKey) {
			$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
			if (isset($find)&&$find->status) {
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("You account is active.")));
			} elseif(isset($find->activeKey) && ($find->activeKey==$activeKey)) {
				$find->activeKey = UserModule::encrypting(microtime());
=======
		$activkey = $_GET['activkey'];
		if ($email&&$activkey) {
			$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
			if (isset($find)&&$find->status) {
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("You account is active.")));
			} elseif(isset($find->activkey) && ($find->activkey==$activkey)) {
				$find->activkey = UserModule::encrypting(microtime());
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
				$find->status = 1;
				$find->save();
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("You account is activated.")));
			} else {
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("Incorrect activation URL.")));
			}
		} else {
			$this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("Incorrect activation URL.")));
		}
	}

}