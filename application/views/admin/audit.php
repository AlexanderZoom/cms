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

<th class="header-action text-center"><?php echo ___('Type');?></th>
<th class="text-center"><?php echo ___('Message');?></th>
<th class="header-action text-center"><?php echo ___('User');?></th>
<th class="header-action text-center"><?php echo ___('Created_at');?></th>
</tr>
                      </thead>
                      <tbody>
                       <?php foreach ($audits as $audit):?>
     
<tr >
    
    <td class="text-center"><?php echo $audit['type'];?></td>
    
    <td class="td-wrap">  <?php echo nl2br($audit['message']);?></td>
    <td class="text-center"><?php echo $audit['user'];?></td>
    <td class="text-center"><?php echo $audit['created_at'];?></td>
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