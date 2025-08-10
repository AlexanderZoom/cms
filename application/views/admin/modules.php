<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="panel panel-default col-lg-min-width">
<div class="panel-body">



<div class="col-lg-12 padding-null">
<form action="" method="POST" id="form">
<table class="table table-bordered table-hover table-striped ">
<thead>
<tr>
<th class="header text-center"><?php echo ___('Name');?></th>
<th class="header text-center"><?php echo ___('Description');?></th>
<th class="header text-center"><?php echo ___('Status');?></th>
<th class="header header-disabled text-center"><?php echo ___('Enabled');?></th>
<th class="header header-disabled text-center"><?php echo ___('Loaded');?></th>
</tr>
</thead>
<tbody>
<?php foreach ($modules as $moduleName => $module):?>
<tr>
    <td class="text-center"><?php echo $moduleName;?> <?php echo $module['info']['version'];?></td>
    <td class="text-center"><?php echo $module['info']['description'];?></td>
    <td class="text-center"><?php echo strtoupper($module['status']);?></td>
    <td class="text-center"><?php if ($module['info']['enable']):?><i class="fa fa-check"><?php else:?><i class="fa fa-ban"></i><?php endif;?></i></td>
    <td class="text-center"><?php if ($module['loaded']):?><i class="fa fa-check"><?php else:?><i class="fa fa-ban"></i><?php endif;?></i></td>
    
</tr>
<?php endforeach;?>
</tbody>
</table>
</form>
</div>


</div>
</div>