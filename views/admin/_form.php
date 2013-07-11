<<<<<<< HEAD
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'user-form',
    'focus'=>array($model, 'username'),
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>

<p class="muted"><small><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></small></p>
<?php echo $form->errorSummary(array($model, $profile)); ?>

<?php echo $form->textFieldRow($model, 'username'); ?>
<?php echo $form->passwordFieldRow($model, 'password'); ?>
<?php echo $form->textFieldRow($model, 'email', array('class'=>'span5', 'maxlength'=>128)); ?>

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
            echo CHtml::activeTextArea($profile, $field->varname, array('rows'=>6, 'cols'=>50));
        } else {
            echo $form->textField($profile, $field->varname, array('size'=>60, 'maxlength'=>(($field->field_size) ? $field->field_size : 255)));
        }
        echo $form->error($profile, $field->varname);
    }
}
?>

<?php echo $form->dropDownListRow($model, 'status', User::itemAlias('UserStatus')); ?>
<?php echo $form->dropDownListRow($model, 'superuser', User::itemAlias('AdminStatus')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>UserModule::t("Save"))); ?>
</div>

<?php $this->endWidget(); ?>
=======
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'superuser'); ?>
		<?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus')); ?>
		<?php echo $form->error($model,'superuser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
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
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
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
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
