<<<<<<< HEAD
<hr>
<p class="muted"><?php echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
  'action'=>Yii::app()->createUrl($this->route),
  'method'=>'get',
  'focus'=>array($model, 'id'),
)); ?>

  <?php echo $form->textFieldRow($model, 'id'); ?>
  <?php echo $form->textFieldRow($model, 'username', array('maxlength'=>20)); ?>
  <?php echo $form->textFieldRow($model, 'email', array('class'=>'span4', 'maxlength'=>128)); ?>
  <?php echo $form->textFieldRow($model, 'activeKey', array('class'=>'span5', 'maxlength'=>128)); ?>
  <?php echo $form->textFieldRow($model, 'create_at'); ?>
  <?php echo $form->textFieldRow($model, 'lastvisit_at'); ?>
  <?php echo $form->dropDownListRow($model, 'superuser', $model->itemAlias('AdminStatus')); ?>
  <?php echo $form->dropDownListRow($model, 'status', $model->itemAlias('UserStatus')); ?>

  <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>UserModule::t('Search'))); ?>
  </div>

<?php $this->endWidget(); ?>
=======
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model,'id'); ?>
        <?php echo $form->textField($model,'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'activkey'); ?>
        <?php echo $form->textField($model,'activkey',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'create_at'); ?>
        <?php echo $form->textField($model,'create_at'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'lastvisit_at'); ?>
        <?php echo $form->textField($model,'lastvisit_at'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'superuser'); ?>
        <?php echo $form->dropDownList($model,'superuser',$model->itemAlias('AdminStatus')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',$model->itemAlias('UserStatus')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(UserModule::t('Search')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
