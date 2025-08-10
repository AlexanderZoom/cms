<?php defined('SYSPATH') OR die('No direct script access.');  $lang = I18n::lang();?>
<div class="panel panel-default">
<div class="panel-body">

<div class="col-lg-3  ui-sortable text-left padding-null">

</div>
<div class="col-lg-5  ui-sortable text-center padding-null">
<?php echo $pagination;?>
</div>
<div class="col-lg-3  ui-sortable text-right padding-null">

</div>
<div class="col-lg-1  ui-sortable text-right padding-null">

</div>

<div class="col-lg-12 ui-sortable">
<div id="borderedTable" class="body collapse in">
<form action="" method="POST" id="form">
                    <table class="table table-bordered responsive-table">
                      <thead>
                        <tr>

<th class="header-action text-center"><?php echo ___('Level');?></th>
<th class="text-center"><?php echo ___('Message');?></th>
<th class="header-action text-center"><?php echo ___('Type');?></th>
</tr>
                      </thead>
                      <tbody>
                       <?php foreach ($notifications as $notification):?>
<?php 
$bgclass = '';
switch ($notification['level']){
	case Admin_Notification::LEVEL_ERROR:
		$bgclass = 'bg-danger';
		break;
		
	case Admin_Notification::LEVEL_INFO:
		$bgclass = 'bg-info';
		break;
		
	case Admin_Notification::LEVEL_WARNING:
		$bgclass = 'bg-warning';
		break;
}
?>                       
<tr class="<?php echo $bgclass;?>">
    
    <td class="text-center"><?php echo $notification['level'];?></td>
    
    <td class="td-wrap"> <?php if ($notification['subject']):?> <?php echo $notification['subject'];?><br/><?php endif;?> <?php echo $notification['message'];?></td>
    <td class="text-center">
      <?php echo $notification['type'];?>
    </td>
</tr>
<?php endforeach;?>                  
                      </tbody>
                    </table>
                    </form>
                  </div>
</div>


<div class="col-lg-3  ui-sortable text-left padding-null">

</div>
<div class="col-lg-5  ui-sortable text-center padding-null">
<?php echo $pagination;?>
</div>
<div class="col-lg-3  ui-sortable text-right padding-null">
</div>
<div class="col-lg-1  ui-sortable text-right padding-null">

</div>
</div>
</div>