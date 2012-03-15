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

            Guias asignadas: 100/100
			<?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>100,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Guias disponibles: 45%
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>45,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Asignadas Cancún: 10%
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>10,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Asignadas Chetumal: 65%            
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>65,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Asignadas otros: 25%            
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>25,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
</div>
                
<div class="span-10">
<?php
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
                        <th>Ene</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Abr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>Jul</th>
                    </tr>
                </thead>
    
                <tbody>
                    <tr>
                      <th>Asignaciones</th>
                      <td>3923</td>
                      <td>2923</td>
                      <td>2931</td>
                      <td>3942</td>
                      <td>4921</td>
                      <td>6934</td>
                      <td>5934</td>
                    </tr>
                    <tr>
                      <th>Bajas</th>
                      <td>3623</td>
                      <td>2623</td>
                      <td>2831</td>
                      <td>3842</td>
                      <td>4821</td>
                      <td>6534</td>
                      <td>5134</td>
                    </tr>
                    <tr>
                      <th>Disponibles </th>
                        <td>3523</td>
                        <td>2223</td>
                        <td>2531</td>
                        <td>3342</td>
                        <td>4521</td>
                        <td>6234</td>
                        <td>5434</td>
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
                        <th>Ene</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Abr</th>
                        <th>May</th>
                        <th>Jun</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Asignaciones</th>
                        <td>39523</td>
                        <td>26123</td>
                        <td>29031</td>
                        <td>34342</td>
                        <td>48321</td>
                        <td>42234</td>
                    </tr>
                    <tr>
                        <th>Bajas</th>
                        <td>34523</td>
                        <td>22123</td>
                        <td>25031</td>
                        <td>30342</td>
                        <td>45321</td>
                        <td>46234</td>
                    </tr>
                </tbody>
            </table>
            
            
        </div>
    </div>
</div>
<?php $this->endWidget();?>
</div>


</div>