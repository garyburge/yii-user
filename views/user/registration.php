<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t('Registration');
$this->breadcrumbs=array(
	UserModule::t('Registration'),
);
?>

<div class="container">
	<div class="page-header">
		<h1><?php echo UserModule::t('Registration'); ?></h1>
	</div>
	
	<div class="row">
		<div class="col-md-8">

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
			
			    <?php echo $form->textFieldGroup($model, 'username'); ?>
			    <?php echo $form->passwordFieldGroup($model, 'password'); ?>
			    <?php echo $form->passwordFieldGroup($model, 'verifyPassword'); ?>
			    <?php echo $form->textFieldGroup($model, 'email'); ?>
			
			    <?php
			      $profileFields = $profile->getFields();
			      if ($profileFields) {
			        foreach($profileFields as $field) {
			    ?>
			      <?php //echo $form->labelEx($profile,$field->varname); ?>
			      <?php
			        if ($widgetEdit = $field->widgetEdit($profile)) {
			        	echo $form->labelEx($profile,$field->varname)."<br>";
			          echo $widgetEdit."<br>";
			          echo $form->error($profile,$field->varname)."<br>";
			        } elseif ($field->range) {
			          echo $form->dropDownListGroup($profile, $field->varname, Profile::range($field->range));
			        } elseif ($field->field_type == "TEXT") {
			          echo$form->textAreaGroup($profile, $field->varname, array('rows'=>6));
			        } else {
			          echo $form->textFieldGroup($profile, $field->varname, array('size'=>60, 'maxlength'=>(($field->field_size) ? $field->field_size : 255)));
			        }
			      ?>
			      <?php //echo $form->error($profile,$field->varname); ?>
			    <?php
			        }
			      }
			    ?>
			
			    <?php if(CCaptcha::checkRequirements()): ?>
			      <?php echo $form->captchaGroup($model, 'verifyCode', array(
			          'hint'=>UserModule::t("Please enter the letters as they are shown in the image above.").' '.UserModule::t("Letters are not case-sensitive.")
			        ));
			      ?>
			    <?php endif; ?>
			
			    <div class="form-actions">
			      <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'context'=>'primary', 'label'=>UserModule::t("Register"))); ?>
			    </div>
			
			  <?php $this->endWidget(); ?>
			<?php endif; ?>
			
		</div><!-- .col-md-8 -->
	</div><!-- .row -->
</div><!-- .container -->

