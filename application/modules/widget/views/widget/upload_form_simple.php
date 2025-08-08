<?php defined('SYSPATH') or die('No direct script access.'); ?>
<form enctype="multipart/form-data" action="<?php echo $upload ?>" method="POST">
    <?php if ($max_file_size) : ?>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <?php endif;?>
    <?php //for ($files_begin = 0; $files_begin < $files; $files_begin++): ?>
    <?php echo ___('File'); ?>: <input name="file" type="file" />
    <br/>
    <?php //endfor; ?>
    <input type="submit" value="<?php echo ___('Send File'); ?>" />
</form>