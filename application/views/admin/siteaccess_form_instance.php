<?php defined('SYSPATH') OR die('No direct script access.');  $lang = I18n::lang();?>


<div class="panel panel-default col-lg-min-width">
<div class="panel-body">

<div class="col-lg-4  ui-sortable text-left padding-null">
<form action="" method="POST" id="sform" onsubmit="window.location='<?php echo $searchUrl;?>&search='+ $('#search_string').val(); return false;">   
   <div class="form-group input-group">
   <input type="text" value="<?php echo $search; ?>" class="form-control input-sm" id="search_string">
   <span class="input-group-btn"><button onclick="$('#sform').submit();" class="btn btn-sm btn-default" type="button"><i class="fa fa-search"></i></button></span>
   
   </div>
   </form>
</div>
<div class="col-lg-4  ui-sortable text-center padding-null">
<?php echo $pagination;?>
</div>
<div class="col-lg-4  ui-sortable text-right padding-null">
<div class="btn-group">
   <button type="button" class="btn btn-sm btn-info" onclick="window.location='<?php echo $selectedUrl;?>'"><?php echo ___('Show Selected'); ?></button>
   <button type="button" class="btn btn-sm btn-info" onclick="window.location='<?php echo $resetUrl;?>'"><?php echo ___('Reset Filter'); ?></button>
   <button type="button" class="btn btn-sm btn-info" onclick="window.location='<?php echo $backUrl;?>'"><?php echo ___('Back'); ?></button>
</div>
</div>
 
<form action="" method="POST" id="form"> 
<div class="col-lg-12 ui-sortable">
<div id="borderedTable" class="body collapse in">
<table class="table table-bordered responsive-table">
<thead>
<tr>
<?php foreach ($cols as $col):?>
<th class="header header-action text-center"><?php echo ___($col);?></th>
<?php endforeach;?>
<th class="header header-action text-center"><?php echo ___('Rights');?></th>
</tr>
</thead>
<tbody>
<?php foreach ($accessList as $access):?>
<tr>
   <?php foreach ($cols as $col): ?> 
   <td class="text-center"><?php echo $access->$col; ?></td>
   <?php endforeach; ?>
   
   <td class="text-center">
   <?php foreach ($rightsList as $rightsName => $rightsValue):?>
   <span class="button-checkbox"><button type="button" class="btn btn-sm" data-color="primary"><?php echo ___($rightsName); ?></button><input name="<?php echo $package; ?><?php echo "{$delimName}{$structure}{$delimName}{$emptyWord}{$delimName}{$access->$instanceId}{$delimName}{$rightsName}"; ?>" type="checkbox" class="hidden"  <?php if (isset($accessListInstances[$access->$instanceId]['rights']) && ($accessListInstances[$access->$instanceId]['rights'] & $rightsValue)) : ?>checked<?php endif;?> /></span>
   <?php endforeach;?>
    </td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>
</div>

<div class="col-lg-4  ui-sortable text-left padding-null">
&nbsp;
</div>
<div class="col-lg-4  ui-sortable text-center padding-null">
<?php echo $pagination;?>
</div>
<div class="col-lg-4  ui-sortable text-right padding-null">
    <?php if($controller->getRights(Admin_Access::ACCESS_MODIFY)->result): ?>
  <button type="submit" name='save' class="btn btn-sm btn-default"><?php echo ___('Save'); ?></button>
  <?php endif; ?>
</div>
</form>

</div>
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
