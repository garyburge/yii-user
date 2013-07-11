<?php
<<<<<<< HEAD
  $this->breadcrumbs = array(
    UserModule::t('Users')=>array('admin'),
    $model->username,
  );
?>

<h1><?php echo UserModule::t('View User') . ' "' . $model->username . '"'; ?></h1>

<?php
  $attributes = array(
    'id',
    array(
      'name'=>'status',
      'value'=>User::itemAlias("UserStatus", $model->status),
    ),
    array(
      'name'=>'superuser',
      'value'=>User::itemAlias("AdminStatus", $model->status),
    ),
    'username',
    'email',
  );

  $profileFields = ProfileField::model()->forOwner()->sort()->findAll();
  if ($profileFields) {
    foreach ($profileFields as $field) {
      array_push($attributes, array(
        'label'=>UserModule::t($field->title),
        'name'=>$field->varname,
        'type'=>'raw',
        'value'=>(($field->widgetView($model->profile)) ? $field->widgetView($model->profile) : (($field->range) ? Profile::range($field->range, $model->profile->getAttribute($field->varname)) : $model->profile->getAttribute($field->varname))),
      ));
    }
  }

  array_push($attributes, array(
    'name'=>'create_at',
    'type'=>'date',
  ));
  array_push($attributes, array(
    'name'=>'lastvisit_at',
    'type'=>'datetime',
  ));

  $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'condensed striped',
    'data'=>$model,
    'attributes'=>$attributes,
  ));
=======
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	$model->username,
);


$this->menu=array(
    array('label'=>UserModule::t('Create User'), 'url'=>array('create')),
    array('label'=>UserModule::t('Update User'), 'url'=>array('update','id'=>$model->id)),
    array('label'=>UserModule::t('Delete User'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);
?>
<h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>

<?php
 
	$attributes = array(
		'id',
		'username',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,
		'password',
		'email',
		'activkey',
		'create_at',
		'lastvisit_at',
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)
	);
	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
?>
