<!DOCTYPE html>
<html>
    <title><?php echo $page_title; ?></title>
    
<body>
    <p><?php echo $Content;?></p>
    <!-- Templating Engine -->
    <p><?= $Content;?></p>
    <h1>Subject List</h1>
<?php
foreach($subjects_list as $v):
    echo '<li>'.$v['subject'].'</li>';
    echo '<p>'.$v['abbr'].'</p>';
endforeach;
?>
</body>
    </html>