<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Bienvenido al <i><?php echo CHtml::encode(Yii::app()->name); ?></i> Reportes</h1>

<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
    if ($key=='counters') {continue;}
    echo "<div class='flash-{$key}'>{$message}</div>";
} ?>

<div class="span-23 showgrid">
<div class="dashboardIcons span-16">

    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/asigxf'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-calendar.png" alt="Asignaciones del periodo" /></a>
        <div class="dashIconText "><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/asigxf'; ?>">Asignaciones <br>del periodo</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/asigxo'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-house.png" alt="Asignaciones del origen" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/asigxo'; ?>">Asignaciones <br>del origen</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/bajxf'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-outbox2.png" alt="Bajas del periodo" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=origenes/bajxf'; ?>">Bajas del <br>periodo</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/bajxd'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-truck2.png" alt="Bajas del destino" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/bajxd'; ?>">Bajas del <br>destino</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/bajxu'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-people4.png" alt="Bajas del usuario" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/bajxu'; ?>">Bajas del <br>usuario</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/guiasd'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-inbox-empty.png" alt="Guias disponibles" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/guiasd'; ?>">Guias disponibles</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/guiasdxo'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-clipboard.png" alt="Guias disponibles del origen" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/guiasdxo'; ?>">Guias disponibles del origen</a></div>
    </div>
    
</div>
</div>
