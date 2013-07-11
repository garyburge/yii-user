<?php
<<<<<<< HEAD
  $this->breadcrumbs = array(
    UserModule::t('Profile Fields') => array('admin'),
    UserModule::t('Create'),
  );
?>
<h1><?php echo UserModule::t('Create Profile Field'); ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
=======
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Create'),
);
$this->menu=array(
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
);
?>
<h1><?php echo UserModule::t('Create Profile Field'); ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
