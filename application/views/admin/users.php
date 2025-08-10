<?php defined('SYSPATH') OR die('No direct script access.');  $lang = I18n::lang();?>
<script type="text/javascript">
function set_check(){
	var ch = $('.checker_control').prop('checked');
	$('.checker').prop('checked', ch);
}

function submit_form(action, id){
	

	var actionCreate = '<?php echo URL::site(Route::url('admin', array('controller'=>'users', 'lang' => $lang, 'action'=>'create')));?>';
	var actionEdit = '<?php echo URL::site(Route::url('admin', array('controller'=>'users', 'lang' => $lang, 'action'=>'edit')));?>';
	var actionDelete = '<?php echo URL::site(Route::url('admin', array('controller'=>'users', 'lang' => $lang, 'action'=>'delete')));?>';
		
	

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
		 //$("#form input:checkbox[class=checker]:checked").prop('checked', false);

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
<div class="panel panel-default col-lg-min-width">
<div class="panel-body">

<div class="col-lg-3  ui-sortable text-left padding-null">
<div class="btn-group">
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
<form action="" method="POST" id="sform" onsubmit="window.location='<?php echo $searchUrl;?>'+ $('#search_string').val(); return false;">   
   <div class="form-group input-group">
   <input type="text" value="<?php echo $search; ?>" class="form-control input-sm" id="search_string">
   <span class="input-group-btn"><button onclick="$('#sform').submit();" class="btn btn-sm btn-default" type="button"><i class="fa fa-search"></i></button></span>
   
   </div>
   </form>
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
<th class="header header-checkbox"><input class="checker_control" type="checkbox" onclick="set_check()"></th>
<th class="header text-center"><?php echo ___('Login');?></th>
<th class="header text-center"><?php echo ___('Group');?></th>
<th class="header header-disabled text-center"><?php echo ___('Enabled');?></th>
<th class="header header-action text-center"><?php echo ___('Action');?></th>
</tr>
</thead>
<tbody>
<?php foreach ($users as $user):?>
<tr>
    <td><input type="checkbox" class="checker" name="checked[]" id="checker<?php echo $user->id;?>" value="<?php echo $user->id;?>"></td>
    <td><?php echo $user->login;?></td>
    <td class="text-center"><?php $groupsArray = array(); $groups = $user->groups->find_all(); foreach ($groups as $group) $groupsArray[] = $group->code; echo implode(', ', $groupsArray);?></td>
    <td class="text-center"><?php if ($user->is_disabled):?><i class="fa fa-ban"><?php else:?><i class="fa fa-check"></i><?php endif;?></i></td>
    <td class="text-center">
      <div class="btn-group ">
       <button type="button" class="btn btn-default btn-xs" onclick="submit_form('edit', <?php echo $user->id;?>);"><?php if($controller->getRights(Admin_Access::ACCESS_MODIFY, 'edit', $user->id)->result):?><?php echo ___('Edit');?><?php else:?><?php echo ___('View');?><?php endif;?></button>
       <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown"><span class="caret"></span></button>
       <ul class="dropdown-menu dropdown-menu-table">
       <?php if($controller->getRights(Admin_Access::ACCESS_DELETE, 'delete', $user->id)->result):?>
       <li><a href="#" onclick="submit_form('delete', <?php echo $user->id;?>);"><?php echo ___('Delete');?></a></li>
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
<div class="btn-group">
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
<form action="" method="POST" id="sform" onsubmit="window.location='<?php echo $searchUrl;?>'+ $('#search_string2').val(); return false;">   
   <div class="form-group input-group">
   <input type="text" value="<?php echo $search; ?>" class="form-control input-sm" id="search_string2">
   <span class="input-group-btn"><button onclick="$('#sform').submit();" class="btn btn-sm btn-default" type="button"><i class="fa fa-search"></i></button></span>
   
   </div>
   </form>
</div>
<div class="col-lg-1  ui-sortable text-right padding-null">
    <?php if($controller->getRights(Admin_Access::ACCESS_CREATE, 'create')->result):?>
    <button type="button" class="btn btn-default btn-sm" onclick="submit_form('create');"><?php echo ___('Create');?></button>
    <?php endif;?>
</div>

</div>
</div>