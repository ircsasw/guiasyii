<?php  
  $baseUrl = Yii::app()->theme->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile('http://www.google.com/jsapi');
  $cs->registerCoreScript('jquery');
  $cs->registerScriptFile($baseUrl.'/js/jquery.gvChart-1.0.1.min.js');
  $cs->registerScriptFile($baseUrl.'/js/pbs.init.js');
  $cs->registerCssFile($baseUrl.'/css/jquery.css');

?>

<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Bienvenido al <i><?php echo CHtml::encode(Yii::app()->name); ?></i> Panel de control</h1>
<div class="span-23 showgrid">
<div class="dashboardIcons span-16">
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/baja'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-outbox2.png" alt="Bajas" /></a>
        <div class="dashIconText "><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/baja'; ?>">Bajas</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/asigna'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-inbox2.png" alt="Asignaciones" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=guias/asigna'; ?>">Asignaciones</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=origenes/admin'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-house.png" alt="Origenes" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=origenes/admin'; ?>">Origenes</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=destinos/admin'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-truck2.png" alt="Destinos" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=destinos/admin'; ?>">Destinos</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=site/reportes'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-chart.png" alt="Reportes" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=site/reportes'; ?>">Reportes</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=usuarios/admin'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-people4.png" alt="Usuarios" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=usuarios/admin'; ?>">Usuarios</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=site/contact'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-address-book.png" alt="Contacto" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=site/contact'; ?>">Contacto</a></div>
    </div>
    
    <?php /*
    <div class="dashIcon span-3">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-calendar.png" alt="Calendar" /></a>
        <div class="dashIconText"><a href="#">Calendar</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-recycle-bin.png" alt="Trash" /></a>
        <div class="dashIconText"><a href="#">Trash</a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-warning.png" alt="System Alerts" /></a>
        <div class="dashIconText"><a href="#">System Alerts</a></div>
    </div>
   */ ?>
    
</div><!-- END OF .dashIcons -->
<div class="span-7 last">

            Guias disponibles: <?php $dis=round(($disponibles/$totalGuias)*100); echo $dis.'% ('.$disponibles.'/'.$totalGuias; ?>)
			<?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>$dis,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Asignadas <?php $asi=round(($top3[0]['totasig']/$totalGuias)*100); echo  ucwords(strtolower(substr($top3[0]['origen'],0,15))).': '.$asi.'% ('.$top3[0]['totasig'].'/'.$totalGuias; ?>)
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>$asi,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Asignadas <?php $asi=round(($top3[1]['totasig']/$totalGuias)*100); echo  ucwords(strtolower(substr($top3[1]['origen'],0,15))).': '.$asi.'% ('.$top3[1]['totasig'].'/'.$totalGuias; ?>)
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>$asi,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Asignadas <?php $asi=round(($top3[2]['totasig']/$totalGuias)*100); echo  ucwords(strtolower(substr($top3[2]['origen'],0,15))).': '.$asi.'% ('.$top3[2]['totasig'].'/'.$totalGuias; ?>)            
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>$asi,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Asignadas <?php $otros=$totalGuias-($top3[0]['totasig']+$top3[1]['totasig']+$top3[2]['totasig']); $asi=round(($otros/$totalGuias)*100); echo 'Otros: '.$asi.'% ('.$otros.'/'.$totalGuias; ?>)            
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>$asi,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
</div>
                
<div class="span-10">
<?php

$a[1]  = "Ene"; 
$a[2]  = "Feb"; 
$a[3]  = "Mar"; 
$a[4]  = "Abr"; 
$a[5]  = "May"; 
$a[6]  = "Jun"; 
$a[7]  = "Jul"; 
$a[8]  = "Ago";
$a[9]  = "Sep";
$a[10] = "Oct";
$a[11] = "Nov";
$a[12] = "Dic";

$this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>'Operaciones del año',
));
?>
<div class="chart2">
<div>
        <div class="text">
            <table class="myChart">
                <thead>
                    <tr>
                        <th></th>
                        <?php 
                        	foreach ($bajxmes as $recrd)
                        		echo '<th>'.$a[$recrd['mes']].'</th>';
                        ?>
                    </tr>
                </thead>
    
                <tbody>
                	<tr>
                      <th>Bajas</th>
                      <?php 
                        	foreach ($bajxmes as $recrd)
                        		echo '<td>'.$recrd['total'].'</td>';
                      ?>
                    </tr>
                </tbody>
            </table>
            
            
      </div>
  </div>
</div>
<?php $this->endWidget();?>
</div>
<div class="span-13 last">
<?php
$this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>'Asignaciones & Bajas',
));
?>
<div class="chart3">
    <div>
        <div class="text">
            <table class="myChart">
                <thead>
                    <tr>
                        <th></th>
                        <?php 
                        	foreach ($a as $mes) {
                        		echo '<th>'.$mes.'</th>';
                        	}
                        ?>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Asignaciones</th>
                        <?php 
                        	for ($m=1; $m<=12; $m++) {
                        		$total = 0;
                        		foreach ($asixmes as $recrd) {
                        			if ($recrd['mes']==$m) {
                        				$total = $recrd['total'];
                        				break;
                        			}
                        		}
                        		echo '<td>'.$total.'</td>';
                        	}
                        ?>
                    </tr>
                    <tr>
                        <th>Bajas</th>
                        <?php 
                        	for ($m=1; $m<=12; $m++) {
                        		$total = 0;
                        		foreach ($bajxmes as $recrd) {
                        			if ($recrd['mes']==$m) {
                        				$total = $recrd['total'];
                        				break;
                        			}
                        		}
                        		echo '<td>'.$total.'</td>';
                        	}
                        ?>
                    </tr>
                </tbody>
            </table>
            
            
        </div>
    </div>
</div>
<?php $this->endWidget();?>
</div>


</div>