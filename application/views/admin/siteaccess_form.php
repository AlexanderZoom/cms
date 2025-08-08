<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<script type="text/javascript">
<!--
var actionInstance = '<?php echo URL::site(Route::url('admin', array('controller'=>'siteAccess', 'lang' => $lang, 'action'=>'instance')));?>';
//-->
</script>
<style>
.form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;
}
</style>
<div class="panel panel-default">
<form class="form-horizontal" method="POST" action="" novalidate>
<div class="panel-body">
<div class="col-lg-12">

    
<?php if (count($listAccess)):?>
<div class="panel-group" id="accordion">
<?php foreach ($listAccess as $classAccess ):  
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo ___($classAccess::$package)?>"><?php echo ___($classAccess::$package)?></a>
            &nbsp;<small>(<?php echo ___($classAccess::$description)?>)</small>
        </h4>
     </div>
     <div id="<?php echo $classAccess::$package; ?>" class="panel-collapse collapse in">
         <div class="panel-body">
         <table class="table table-striped table-without-mbottom">
                <tbody>
             <?php if (count($classAccess::$rights)): 
               $except = !empty($rights["{$classAccess::$package}{$delimName}{$emptyWord}{$delimName}{$emptyWord}"]['except']) ? true : false;
             ?>
         	 
             
                  <tr>
                    <td><?php echo ___('package rights'); ?></td>
                    <td>
                    <span class="button-checkbox"><button type="button" class="btn btn-default btn-sm" data-color="warning"><?php echo ___('Not'); ?></button><input name="<?php echo $classAccess::$package; ?><?php echo "{$delimName}{$emptyWord}{$delimName}{$emptyWord}{$delimName}"; ?>EXCEPT" type="checkbox" class="hidden"  <?php if ($except): ?>checked<?php endif;?> /></span>
                    </td>
                    <td>
                        <?php foreach ($classAccess::$rights as $rightsName => $rightsValue ):
                        
                        	$right = false;
                        	if (!empty($rights["{$classAccess::$package}{$delimName}{$emptyWord}{$delimName}{$emptyWord}"]['rights'])):
                        		$right = $rights["{$classAccess::$package}{$delimName}{$emptyWord}{$delimName}{$emptyWord}"]['rights'] & $rightsValue ? true : false;
                        	endif;
                        	
                        ?>
                        <span class="button-checkbox"><button type="button" class="btn btn-default btn-sm" data-color="primary"><?php echo ___($rightsName); ?></button><input name="<?php echo $classAccess::$package; ?><?php echo "{$delimName}{$emptyWord}{$delimName}{$emptyWord}{$delimName}"; ?><?php echo $rightsName; ?>" type="checkbox" class="hidden"  <?php if ($right) : ?>checked<?php endif;?> /></span>
                        <?php endforeach;?>
                    </td>
                    
                  </tr>
                  <tr>
                  <td colspan="3">&nbsp;</td>
                  </tr>
               
             
         
         	 <?php endif;?>
             <?php if (count($classAccess::$structure)):
            	 
             ?>
            
                  <?php foreach ($classAccess::$structure as $structureName => $structureData):
                    $idxStructName = "{$classAccess::$package}{$delimName}{$structureName}{$delimName}{$emptyWord}";
                  	$except = !empty($rights[$idxStructName]['except']) ? true : false;
                  	
                  ?>
                  <tr>
                    <td><?php echo $structureName; ?><?php if (!empty($structureData['description'])) :?>&nbsp;<small>(<?php echo ___($structureData['description']); ?>)</small><?php endif;?></td>
                    <td>
                    <span class="button-checkbox"><button type="button" class="btn btn-default btn-sm" data-color="warning"><?php echo ___('Not'); ?></button><input name="<?php echo $classAccess::$package; ?><?php echo "{$delimName}"; ?><?php echo $structureName; ?><?php echo "{$delimName}{$emptyWord}{$delimName}";?>EXCEPT" type="checkbox" class="hidden"  <?php if ($except): ?>checked<?php endif;?>  /></span>
                    </td>
                    <td>
                        <?php foreach ($structureData['rights'] as $rightsName => $rightsValue ):
	                        $right = false; 
	                        if (!empty($rights[$idxStructName]['rights'])):
	                        $right = $rights[$idxStructName]['rights'] & $rightsValue ? true : false;
	                        endif;
                        ?>
                        <span class="button-checkbox"><button type="button" class="btn btn-default btn-sm" data-color="primary"><?php echo ___($rightsName); ?></button><input name="<?php echo $classAccess::$package; ?><?php echo "{$delimName}";?><?php echo $structureName; ?><?php echo "{$delimName}{$emptyWord}{$delimName}"; ?><?php echo $rightsName; ?>" type="checkbox" class="hidden"  <?php if ($right) : ?>checked<?php endif;?>  /></span>
                        <?php endforeach;?>
                        <?php if (isset($structureData['instance'])):?>
                        &nbsp;&nbsp; 
                        <button type="button" class="btn btn-sm btn-info" onclick="window.location = actionInstance+'?gid=<?php echo $groupId;?>&package=<?php echo $classAccess::$package;?>&structure=<?php echo $structureName;?>';"><?php echo ___('Instance'); ?></button>
                        <span class="button-checkbox"><button type="button" class="btn btn-default btn-sm" data-color="primary"><?php echo ___('Inherit'); ?></button><input name="<?php echo "{$classAccess::$package}{$delimName}{$structureName}{$delimName}{$emptyWord}{$delimName}_inherit_"; ?>" type="checkbox" class="hidden"  <?php if (!empty($rights[$idxStructName]['instance_inherit'])) : ?>checked<?php endif;?>  /></span>
                        <span class="button-checkbox"><button type="button" class="btn btn-default btn-sm" data-color="primary"><?php echo ___('Invert'); ?></button><input name="<?php echo "{$classAccess::$package}{$delimName}{$structureName}{$delimName}{$emptyWord}{$delimName}_invert_"; ?>" type="checkbox" class="hidden"  <?php if (!empty($rights[$idxStructName]['instance_invert'])) : ?>checked<?php endif;?>  /></span>
                        <?php endif;?>
                    </td>
                    
                  </tr>
                  <?php endforeach; ?>
                
              <?php endif;?>
               </tbody>
              </table>
            </div>
        </div>
</div>
                
<?php endforeach; ?>
</div>
<?php endif; ?>
    


  
  
  </div>
</div>
             
<div class="panel-footer">

  <?php if($controller->getRights(Admin_Access::ACCESS_MODIFY)->result): ?>
  <div class="form-actions center">
  <button type="submit" name='save' class="btn btn-default"><?php echo ___('Save'); ?></button>
  </div>
  <?php endif; ?>
</div>
            
</form>
</div>

<script type="text/javascript">
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>
