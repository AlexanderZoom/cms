<?php defined('SYSPATH') OR die('No direct script access.');  $lang = I18n::lang();?>
<script type="text/javascript">
function set_check(){
	var ch = $('.checker_control').prop('checked');
	$('.checker').prop('checked', ch);
}

function submit_form(action, id){
	

	var actionCreate = '<?php echo URL::site(Route::url('admin', array('controller'=>'cron', 'lang' => $lang, 'action'=>'create')));?>';
	var actionEdit = '<?php echo URL::site(Route::url('admin', array('controller'=>'cron', 'lang' => $lang, 'action'=>'edit')));?>';
	var actionDelete = '<?php echo URL::site(Route::url('admin', array('controller'=>'cron', 'lang' => $lang, 'action'=>'delete')));?>';
	
	

    switch (action){
        case 'create':
        	$('#form').prop('action', actionCreate);
        	$('#form').prop('method', 'GET');
            break;

      
        case 'edit':
        	$('#form').prop('action', actionEdit);
            break;
    
        case 'delete':
            
        	if (!id && !$("#form input:checkbox[class=checker]:checked").length) return false;
            if (!confirm('<?php echo ___('Are you sure want delete ')?>')) return false;
        	$('#form').prop('action', actionDelete);
            break;
    }
    
	
    if (id) {
		 //$('#form').append( '<input type="hidden" name="checked[]" value="'+ id +'">' );
		 //$('#form').prop('method', 'GET');
		 //
    	$("#form input:checkbox[class=checker]:checked").prop('checked', false);
    	$("#checker"+id).prop('checked', true);
    	$('#form').prop('method', 'GET');
	}
	else {
		$('#form').prop('method', 'POST');
	}
	
	$('#form').submit()
}
</script>

<div class="panel panel-default">
<div class="panel-body">

<div class="col-lg-3  ui-sortable text-left padding-null">
<div class="btn-group form-group">
   <button type="button" class="btn btn-default btn-sm"><?php echo ___('Nothing');?></button>
   <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown"><span class="caret"></span></button>
   <ul class="dropdown-menu">
        <?php if($controller->getRights(Admin_Access::ACCESS_DELETE, 'delete')->result):?>
        <li><a href="#" onclick="submit_form('delete');" ><?php echo ___('Delete');?></a></li>
        <?php endif;?>
    </ul>
</div>
</div>
<div class="col-lg-5  ui-sortable text-center padding-null">
<?php echo $pagination;?>
</div>
<div class="col-lg-3  ui-sortable text-right padding-null">

</div>
<div class="col-lg-1  ui-sortable text-right padding-null">
<?php if($controller->getRights(Admin_Access::ACCESS_CREATE, 'create')->result):?>
    <button type="button" class="btn btn-default btn-sm" onclick="submit_form('create');"><?php echo ___('Create');?></button>
    <?php endif;?>
</div>

<div class="col-lg-12 ui-sortable">
<div id="borderedTable" class="body collapse in">
<form action="" method="POST" id="form">
                    <table class="table table-bordered responsive-table">
                      <thead>
                        <tr>
<th class="header-checkbox"><input class="checker_control" type="checkbox" onclick="set_check()"></th>
<th class="text-center"><?php echo ___('minute hour mday month wday command');?></th>
<th class="header-disabled text-center"><?php echo ___('Started At');?></th>
<th class="header-action text-center"><?php echo ___('Action');?></th>
</tr>
                      </thead>
                      <tbody>
                       <?php foreach ($crons as $cron):?>
<tr>
    <td><input type="checkbox" class="checker" name="checked[]" id="checker<?php echo $cron->id;?>" value="<?php echo $cron->id;?>"></td>
    <td><?php echo $cron->minute;?>&nbsp;<?php echo $cron->hour;?>&nbsp;<?php echo $cron->mday;?>&nbsp;<?php echo $cron->month;?>&nbsp;<?php echo $cron->wday;?>&nbsp;<?php echo $cron->command;?> <?php if ($cron->comment): ?>/*<?php echo $cron->comment; ?>*/<?php endif;?></td>
    
    <td class="text-center"><?php echo $cron->started_at;?></td>
    <td class="text-center">
      <div class="btn-group ">
      
       <button type="button" class="btn btn-default btn-xs" onclick="submit_form('edit', <?php echo $cron->id;?>);"><?php if($controller->getRights(Admin_Access::ACCESS_MODIFY, 'edit', $cron->id)->result) echo ___('Edit'); else echo ___('View'); ?></button>
      
       <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown"><span class="caret"></span></button>
       <ul class="dropdown-menu dropdown-menu-table">
       <?php if($controller->getRights(Admin_Access::ACCESS_MODIFY, 'edit', $cron->id)->result):?>
       <li><a href="#" onclick="submit_form('edit', <?php echo $cron->id;?>);"><?php echo ___('Edit');?></a></li>
       <?php endif;?>
       <?php if($controller->getRights(Admin_Access::ACCESS_DELETE, 'delete', $cron->id)->result):?>
       <li><a href="#" onclick="submit_form('delete', <?php echo $cron->id;?>);"><?php echo ___('Delete');?></a></li>
       <?php endif;?>
       </ul>
       </div>
    </td>
</tr>
<?php endforeach;?>                  
                      </tbody>
                    </table>
                    </form>
                  </div>
</div>


<div class="col-lg-3  ui-sortable text-left padding-null">
<div class="btn-group form-group">
   <button type="button" class="btn btn-default btn-sm"><?php echo ___('Nothing');?></button>
   <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown"><span class="caret"></span></button>
   <ul class="dropdown-menu">
        <?php if($controller->getRights(Admin_Access::ACCESS_DELETE, 'delete')->result):?>
        <li><a href="#" onclick="submit_form('delete');" ><?php echo ___('Delete');?></a></li>
        <?php endif;?>
    </ul>
</div>
</div>
<div class="col-lg-5  ui-sortable text-center padding-null">
<?php echo $pagination;?>
</div>
<div class="col-lg-3  ui-sortable text-right padding-null">
</div>
<div class="col-lg-1  ui-sortable text-right padding-null">
<?php if($controller->getRights(Admin_Access::ACCESS_CREATE, 'create')->result):?>
    <button type="button" class="btn btn-default btn-sm" onclick="submit_form('create');"><?php echo ___('Create');?></button>
    <?php endif;?>
</div>
</div>
</div>