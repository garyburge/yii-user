<?php
  $sTitle = UserModule::t('Profile');
  $this->pageTitle = Yii::app()->name.' - '.$sTitle;
  $this->breadcrumbs = array(
    $sTitle=>array('profile'),
    UserModule::t("Edit"),
  );
  $this->menu = array(
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
  );
?>

<div class="page-header">
  <h1><?php echo UserModule::t('Edit Profile'); ?></h1>
</div>

<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
  <?php $this->widget('bootstrap.widgets.TbAlert', array('alerts'=>array('profileMessage'))); ?>
<?php endif; ?>

<?php /** @var BootActiveForm $form */
  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'profile-form',
    'focus'=>array($model, 'username'),
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
  ));
?>

  <p class="help-block"><small><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></small></p>
  <?php echo $form->errorSummary(array($model, $profile)); ?>

  <?php echo $form->textFieldGroup($model, 'username'); ?>
  <?php echo $form->textFieldGroup($model, 'email', array('class'=>'col-md-5')); ?>

  <?php
    $profileFields = $profile->getFields();
    if ($profileFields) {
      foreach ($profileFields as $field) {
        echo $form->labelEx($profile, $field->varname);

        if ($widgetEdit = $field->widgetEdit($profile)) {
          echo $widgetEdit;
        } elseif ($field->range) {
          echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
        } elseif ($field->field_type == "TEXT") {
          echo $form->textArea($profile, $field->varname, array('rows'=>6, 'cols'=>50));
        } else {
          echo $form->textField($profile, $field->varname, array('size'=>60, 'maxlength'=>(($field->field_size) ? $field->field_size : 255)));
        }
        echo $form->error($profile, $field->varname);
      }
    }
  ?>

  <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'context'=>'primary', 'label'=>UserModule::t('Save'))); ?>
  </div>

<?php $this->endWidget(); ?>

