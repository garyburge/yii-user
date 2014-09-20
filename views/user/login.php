<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<div class="container">
	<div class="page-header">
		<h1><?php echo UserModule::t("Login"); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-6">

			<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
			  <?php $this->widget('bootstrap.widgets.TbAlert', array('alerts'=>array('loginMessage'=>array()))); ?>
			<?php endif; ?>

			<p class="help-block"><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

			<?php /** @var TbActiveForm $form */
			  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			    'id'=>'login-form',
			    'focus'=>array($model, 'username'),
			  ));
			?>
			
			  <p class="help-block"><small><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></small></p>
			  <?php $form->errorSummary($model); ?>
			
			  <?php echo $form->textFieldGroup($model, 'username'); ?>
			  <?php echo $form->passwordFieldGroup($model, 'password'); ?>
			  <p class="help-block"><?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?></p>
			  <?php echo $form->checkBoxGroup($model, 'rememberMe'); ?>
			
			  <div class="form-actions">
			    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'context'=>'primary', 'label'=>UserModule::t("Login"))); ?>
			  </div>
			
			<?php $this->endWidget(); ?>
			
		</div><!-- .col-md-6 -->
	</div><!-- .row -->
</div><!-- .container -->

