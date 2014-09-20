<?php
  $sTitle = UserModule::t('Profile');
  $this->pageTitle = Yii::app()->name . ' - ' . $sTitle;
  $this->breadcrumbs = array(
    $sTitle,
  );
  $this->menu = array(
    array('label'=>UserModule::t('Edit Profile'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
  );
?>

<div class="container">
  <div class="page-header">
    <h1><?php echo UserModule::t('Your Profile'); ?></h1>
  </div><!-- .page-header -->
  
  <div class="row">
    <div class="col-md-12">
    
    <?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
        <?php $this->widget('bootstrap.widgets.TbAlert', array('alerts'=>array('profileMessage'=>array()))); ?>
      <?php endif; ?>
    
    <?php
    // For all users
      $attributes = array(
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
    
      $profileFields = ProfileField::model()->forAll()->sort()->findAll();
    
      if ($profileFields) {
        foreach ($profileFields as $field) {
          array_push($attributes, array(
            'label'=>UserModule::t($field->title),
            'name'=>$field->varname,
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
        'data'=>$model,
        'attributes'=>$attributes,
      ));
    ?>
    
    </div><!-- .col-md-12 -->
  </div><!-- .row -->
</div><!-- .container -->
