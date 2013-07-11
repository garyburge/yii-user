<<<<<<< HEAD
<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Change Password");
$this->breadcrumbs = array(
  UserModule::t("Profile")=>array('/user/profile'),
  UserModule::t("Change Password"),
=======
<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change password"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
);
?>

<h1><?php echo UserModule::t("Change password"); ?></h1>

<<<<<<< HEAD
<?php
  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'changepassword-form',
    'focus'=>array($model, 'oldPassword'),
    'enableAjaxValidation'=>true,
    'clientOptions'=>array(
      'validateOnSubmit'=>true,
    ),
  ));
?>

  <p class="help-block muted"><small><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></small></p>
  <?php echo $form->errorSummary($model); ?>

  <?php echo $form->passwordFieldRow($model, 'oldPassword'); ?>
  <?php echo $form->passwordFieldRow($model, 'password'); ?>
  <p class="help-block muted"><?php echo UserModule::t("Minimal password length 4 symbols."); ?></p>
  <?php echo $form->passwordFieldRow($model, 'verifyPassword'); ?>

  <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>UserModule::t("Save"))); ?>
  </div>

<?php $this->endWidget(); ?>
=======
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
	<?php echo $form->labelEx($model,'oldPassword'); ?>
	<?php echo $form->passwordField($model,'oldPassword'); ?>
	<?php echo $form->error($model,'oldPassword'); ?>
	</div>
	
	<div class="row">
	<?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="row">
	<?php echo $form->labelEx($model,'verifyPassword'); ?>
	<?php echo $form->passwordField($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</div>
	
	
	<div class="row submit">
	<?php echo CHtml::submitButton(UserModule::t("Save")); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
