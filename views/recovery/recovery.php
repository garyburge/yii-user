<<<<<<< HEAD
<?php
  $sTitle = UserModule::t('Reset Password');
  $this->pageTitle = Yii::app()->name.' - '.$sTitle;
  $this->breadcrumbs = array(
    UserModule::t('Login') => array('/user/login'),
    $sTitle,
  );
?>

<h1><?php echo $sTitle; ?></h1>

<?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
  <?php $this->widget('bootstrap.widgets.TbAlert', array('alerts'=>array('recoveryMessage'=>array()))); ?>
<?php else: ?>

  <?php /** @var TbActiveForm $form */
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'recovery-form',
      'focus'=>array($model, 'login_or_email'),
    ));
  ?>

    <?php echo $form->textFieldRow($model, 'login_or_email'); ?>
    <p class="help-block"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>

    <div class="form-actions">
      <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$sTitle)); ?>
    </div>

  <?php $this->endWidget(); ?>
=======
<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
?>

<h1><?php echo UserModule::t("Restore"); ?></h1>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="row">
		<?php echo CHtml::activeLabel($form,'login_or_email'); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email') ?>
		<p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
	</div>
	
	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Restore")); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
<?php endif; ?>