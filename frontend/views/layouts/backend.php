<?php
ob_start();
if (ob_get_contents())
    ob_clean();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <!--Override Stylesheet-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend-override.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/printable.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="">
         <?php echo $content; ?>
    </body>


</html>
