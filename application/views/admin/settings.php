<?php defined('SYSPATH') OR die('No direct script access.'); ?>
 <script type="text/javascript">
//$(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation({semanticallyStrict:true}); });
</script>
<div class="panel panel-default">
<form class="form-horizontal" method="POST" novalidate>
<div class="panel-body">
<?php if (count($setting_classes)):?>
<div class="panel-group" id="accordion">
<?php foreach ($setting_classes as $setting_class ):  
	$class = $setting_class['class'];
	$view = $setting_class['view'];
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo str_replace(' ', '-', $class::getTabName()); ?>"><?php echo ___($class::getTabName()); ?></a>
            <?php if($class::getTabDescription()): ?>&nbsp;<small>(<?php echo ___($class::getTabDescription())?>)</small><?php endif; ?>
        </h4>
     </div>
     <div id="<?php echo str_replace(' ', '-', $class::getTabName()); ?>" class="panel-collapse collapse">
         <div class="panel-body">
         <?php echo $view; ?>
         </div>
      </div>
</div>


<?php endforeach; ?>
</div>
<?php endif; ?>

</div>
             
    <div class="panel-footer">
      <div class="form-actions center">
      <?php if($controller->getRights(Admin_Access::ACCESS_MODIFY)->result):?>
      <button type="submit" name='save' class="btn btn-default"><?php echo ___('Save settings'); ?></button>
      <?php endif;?>
      </div>
    </div>
            
</form>
</div>
