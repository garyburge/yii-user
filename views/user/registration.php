<<<<<<< HEAD
<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t('Registration');
$this->breadcrumbs=array(
	UserModule::t('Registration'),
);
?>

<h1><?php echo UserModule::t('Registration'); ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
  <?php $this->widget('bootstrap.widgets.TbAlert', array('alerts'=>array('registration'=>array()))); ?>
<?php else: ?>

  <?php /** @var TbActiveForm $form */
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'registration-form',
      'focus'=>array($model, 'username'),
      'enableAjaxValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
      'htmlOptions' => array('enctype'=>'multipart/form-data'),
    ));
  ?>

    <p class="muted"><small><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></small></p>
    <?php echo $form->errorSummary(array($model,$profile)); ?>

    <?php echo $form->textFieldRow($model, 'username'); ?>
    <?php echo $form->passwordFieldRow($model, 'password'); ?>
    <p class="help-block"><?php echo UserModule::t("Minimal password length 4 symbols."); ?></p>
    <?php echo $form->passwordFieldRow($model, 'verifyPassword'); ?>
    <?php echo $form->textFieldRow($model, 'email', array('class'=>'span4')); ?>

    <?php
      $profileFields = $profile->getFields();
      if ($profileFields) {
        foreach($profileFields as $field) {
    ?>
      <?php echo $form->labelEx($profile,$field->varname); ?>
      <?php
        if ($widgetEdit = $field->widgetEdit($profile)) {
          echo $widgetEdit;
        } elseif ($field->range) {
          echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
        } elseif ($field->field_type == "TEXT") {
          echo$form->textArea($profile, $field->varname, array('rows'=>6, 'cols'=>50));
        } else {
          echo $form->textField($profile, $field->varname, array('size'=>60, 'maxlength'=>(($field->field_size) ? $field->field_size : 255)));
        }
      ?>
      <?php echo $form->error($profile,$field->varname); ?>
    <?php
        }
      }
    ?>

    <?php if(CCaptcha::checkRequirements()): ?>
      <?php echo $form->captchaRow($model, 'verifyCode', array(
          'hint'=>UserModule::t("Please enter the letters as they are shown in the image above.").' '.UserModule::t("Letters are not case-sensitive.")
        ));
      ?>
    <?php endif; ?>

    <div class="form-actions">
      <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>UserModule::t("Register"))); ?>
    </div>

  <?php $this->endWidget(); ?>
=======
<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h1><?php echo UserModule::t("Registration"); ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo $form->errorSummary(array($model,$profile)); ?>
	
	<div class="row">
	<?php echo $form->labelEx($model,'username'); ?>
	<?php echo $form->textField($model,'username'); ?>
	<?php echo $form->error($model,'username'); ?>
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
	
	<div class="row">
	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'email'); ?>
	<?php echo $form->error($model,'email'); ?>
	</div>
	
<?php 
		$profileFields=Profile::getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
		
		<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
		<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
	</div>
	<?php endif; ?>
	
	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Register")); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
<?php endif; ?>