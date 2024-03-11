<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- TailwindCSS and Alpine -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="https://conexa.app/wp-content/uploads/2021/08/favicon.png" type="image/x-icon">


	<!-- blueprint CSS framework -->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/screen.css" media="screen, projection">-->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/print.css" media="print">-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/ie.css" media="screen, projection">
	<![endif]-->
<!---->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/main.css">-->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/form.css">-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="flex flex-col h-screen">

    <?php echo $this->renderPartial('/components/nav'); ?>


    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
    <?php endif?>

    <main class="flex-grow">
        <?php echo $content; ?>
    </main>
    <footer class="h-12 flex-shrink-0">
        <?php echo $this->renderPartial('/components/footer'); ?>
    </footer>
</div>
</body>
</html>
