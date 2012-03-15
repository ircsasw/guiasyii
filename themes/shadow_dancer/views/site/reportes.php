<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Bienvenido al <i><?php echo CHtml::encode(Yii::app()->name); ?></i> Panel de control</h1>
<div class="span-23 showgrid">
<div class="dashboardIcons span-23">
    <div class="dashIcon span-18">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/baja'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-outbox2.png" alt="Bajas" /></a>
        <div class="dashIconText "><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/baja'; ?>">Bajas</a></div>
    </div>
   
</div>
</div>
