<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<?php if($total > $item_on_page):?>
<ul class="pagination pagination-sm margin-null">
<li><a href="<?php echo Util_Url::addParameter($url, array($page_name => $prev));?>">&laquo;</a></li>
<?php for ($i = $start; $i <= $end; $i++): ?>
  
  <li <?php if ($i == $page):?>class='active'<?php endif;?> ><a href="<?php if ($i == $page):?>#<?php else: echo Util_Url::addParameter($url, array($page_name => $i)); endif;?>"><?php echo $i;?></a></li>
 
<?php endfor;?>
<li><a href="<?php echo Util_Url::addParameter($url, array($page_name => $next));?>">&raquo;</a></li>
</ul>
<?php endif;?>