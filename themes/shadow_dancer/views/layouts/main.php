<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu_iestyles.css" />

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container" id="page">
		<div id="topnav">
			<div class="topnav_text">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">Inicio</a>
				<?php if (!Yii::app()->user->isGuest) {?>
					| <a href='#'>Usuario: <?php echo Yii::app()->user->name; ?> </a>
				<?php }?>
				|
				<?php if (!Yii::app()->user->isGuest) {?>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/logout">Salir</a>
				<?php } else {?>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/index">Entrar</a>
				<?php }?>
			</div>
		</div>
		<div id="header">
			<div id="logo">
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png"></img>
				<?php //echo CHtml::encode(Yii::app()->name); ?>
			</div>
		</div>
		<!-- header -->
		
		<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
					array('label'=>'Inicio', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'test'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Asignaciones', 'url'=>array('/guias/asigna'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Bajas', 'url'=>array('/guias/bajas'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Reportes',
						'items'=>array(
							array('label'=>'Asignaciones del periodo', 'url'=>array('/guias/asigxf'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Asignaciones del origen', 'url'=>array('/guias/asigxo'), 'visible'=>!Yii::app()->user->isGuest),
							//array('label'=>'Bajas del Destino', 'url'=>array('/guias/bajxd'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Bajas del periodo', 'url'=>array('/guias/bajxf'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Bajas del destino', 'url'=>array('/guias/bajxd'), 'visible'=>!Yii::app()->user->isGuest),							
							array('label'=>'Bajas del usuario', 'url'=>array('/guias/bajxu'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Guias disponibles', 'url'=>array('/guias/guiasd'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Guias disponibles del origen', 'url'=>array('/guias/guiasdxo'), 'visible'=>!Yii::app()->user->isGuest),
							
							//array('label'=>'Interface Elements', 'url'=>array('/site/page', 'view'=>'interface')),
							//array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')),
							//array('label'=>'Calendar', 'url'=>array('/site/page', 'view'=>'calendar')),
							//array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
						), 'visible'=>!Yii::app()->user->isGuest
					),
					array('label'=>'Acerca de', 'url'=>array('/site/about')),
					//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?> 
		<?php /*
		<div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Inicio', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Asignaciones', 'url'=>array('/guias/asigna'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Bajas', 'url'=>array('/guias/bajas'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Reportes', 'url'=>array('/site/reportes'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Acerca de', 'url'=>array('/site/about')),
					//array('label'=>'Dashboard', 'url'=>array('/site/index')),
					//array('label'=>'Graphs', 'url'=>array('/site/page', 'view'=>'graphs'),'itemOptions'=>array('class'=>'icon_chart')),
					//array('label'=>'Form', 'url'=>array('/site/page', 'view'=>'forms')),
					//array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),
					//array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
					//array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')),
				),
			)); ?>
		</div> */?>
		<!--mainmenu -->
		
		<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
							'links'=>$this->breadcrumbs,
		)); ?>
		<!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>

		<div id="footer">
			&copy;
			<?php echo date('Y'); ?>
			Ivonne Collection<br /> Desarrollado por <a
				href='http://www.ircsasoftware.com.mx'>IRCSA Software</a><br />
				<?php echo Yii::powered(); ?>
		</div>
		<!-- footer -->

	</div>
	<!-- page -->

</body>
</html>
