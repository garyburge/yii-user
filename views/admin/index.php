<?php
<<<<<<< HEAD
$this->breadcrumbs = array(
=======
$this->breadcrumbs=array(
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
	UserModule::t('Users')=>array('/user'),
	UserModule::t('Manage'),
);

<<<<<<< HEAD
=======
$this->menu=array(
    array('label'=>UserModule::t('Create User'), 'url'=>array('create')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);

>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
<<<<<<< HEAD
});
=======
});	
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
<<<<<<< HEAD
?>

<h1><?php echo UserModule::t("Manage Users"); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-grid',
  'type'=>'condensed striped',
=======

?>
<h1><?php echo UserModule::t("Manage Users"); ?></h1>

<p><?php echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>

<?php echo CHtml::link(UserModule::t('Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
<<<<<<< HEAD
			'name'=>'id',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
      'htmlOptions'=>array('style'=>'width:5%;')
		),
		array(
			'name'=>'username',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
      'htmlOptions'=>array('style'=>'width:15%;')
=======
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
		),
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
<<<<<<< HEAD
      'htmlOptions'=>array('style'=>'width:25%;')
		),
    array(
      'name'=>'create_at',
      'value'=>'Yii::app()->format->date($data->create_at)',
      'htmlOptions'=>array('style'=>'width:10%;')
    ),
    array(
      'name'=>'lastvisit_at',
      'value'=>'Yii::app()->format->datetime($data->lastvisit_at)',
      'htmlOptions'=>array('style'=>'width:15%;')
    ),
=======
		),
		'create_at',
		'lastvisit_at',
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
		array(
			'name'=>'superuser',
			'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
			'filter'=>User::itemAlias("AdminStatus"),
<<<<<<< HEAD
      'htmlOptions'=>array('style'=>'width:10%;')
=======
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
<<<<<<< HEAD
			'filter'=>User::itemAlias("UserStatus"),
      'htmlOptions'=>array('style'=>'width:10%;')
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
      'htmlOptions'=>array('style'=>'width:10%; white-space:nowrap;')
		),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array('label'=>UserModule::t('Create User'), 'url'=>array('create'), 'type'=>'primary', 'size'=>'small')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('label'=>UserModule::t('Advanced Search'), 'url'=>'#', 'buttonType'=>'link', 'size'=>'small', 'htmlOptions'=>array('class'=>'search-button'))); ?>

<div class="search-form" style="display:none">
  <?php $this->renderPartial('_search',array(
    'model'=>$model,
  )); ?>
</div><!-- search-form -->

=======
			'filter' => User::itemAlias("UserStatus"),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
