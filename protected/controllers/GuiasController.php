<?php

class GuiasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'asigna', 'crearepo','asigxf','asigxo','bajxd','bajxf','bajxu','guiasdxo','guiasd','bajas'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Guias;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->fecha_asig = date("Y-m-d");
		if(isset($_POST['Guias']))
		{
			$model->attributes=$_POST['Guias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));			
		}
		
        	$this->render('create',array('model'=>$model,));
	}
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function actionAsigna()
	{
		$modelasigna = new AsignaForm();
		
		$modelasigna->fecha_asig = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
		$modelasigna->asignado = Yii::app()->user->id;
		
		$modeladmin = new Guias('search');
		$modeladmin->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Guias']))
			$modeladmin->attributes=$_GET['Guias'];
		
		if(isset($_POST['AsignaForm']))
		{
			$modelasigna->attributes=$_POST['AsignaForm'];
			//$modelasigna->fecha_asig = date('Y-m-d', CDateTimeParser::parse($modelasigna->fecha_asig, Yii::app()->locale->getDateFormat('medium')));
			
			if($modelasigna->validate())
			{
				$inicio   = $modelasigna->folio_ini;
				$fin      = $modelasigna->folio_fin;
				$serie    = $modelasigna->serie;
				$origen   = $modelasigna->id_origen;
				$asigna   = $modelasigna->asignado;
				$asignado = date('Y-m-d', CDateTimeParser::parse($modelasigna->fecha_asig, Yii::app()->locale->getDateFormat('medium')));
				
				$asignadas = Guias::model()->find('folio>= :FolioIni AND folio <= :FolioFin AND serie = :cSerie', array(':FolioIni'=>$inicio, ':FolioFin'=>$fin,':cSerie'=>$serie));
				if (!count($asignadas))
				{
					for ( $i=$inicio; $i<=$fin ; $i++)
					{
						$model = new Guias;
						
						$model->serie      = $serie;
						$model->fecha_asig = $asignado;
						$model->folio      = $i;
						$model->id_origen  = $origen;
						$model->id_asigna  = $asigna;
						
						$model->save();
					}
					
					$modelasigna->unsetAttributes();
					$modelasigna->fecha_asig = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
					$modelasigna->asignado = Yii::app()->user->id;
				}
				
				else 
				{
					$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
					    'id'=>'mydialog',
					    // additional javascript options for the dialog plugin
					    'options'=>array(
					        'title'=>'Control guias: Error',
					        'autoOpen'=>true,
							'modal'=>true,
							'width'=>250,
							'height'=>100,
						)
					));
					echo 'Rango de guias no disponible';
					
					$this->endWidget('zii.widgets.jui.CJuiDialog');
				}
				
				$this->render('asigna', array('modeladmin'=>$modeladmin, 'modelasigna'=>$modelasigna));
			}
			else
				$this->render('asigna', array('modeladmin'=>$modeladmin, 'modelasigna'=>$modelasigna));	
		}
		else 
			$this->render('asigna', array('modeladmin'=>$modeladmin, 'modelasigna'=>$modelasigna));	
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Guias']))
		{
			$model->attributes=$_POST['Guias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Guias');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Guias('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Guias']))
			$model->attributes=$_GET['Guias'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Guias::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='guias-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionBajas()
	{
		$model = new BajasForm();
		$model->fecha = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
		$model->id_baja= Yii::app()->user->id;
				
		if (isset($_POST['BajasForm']))
		{
			$model->attributes=$_POST['BajasForm'];
			
			if($model->validate())
			{	
				$guias = Guias::model()->find('serie=:cSerie AND folio=:cFolio',array(':cSerie'=>$model->serie,':cFolio'=>$model->folio));
				// validar que hay resultado
				if (count($guias) && $guias->id_baja ==0)
				{
					$guias->id_destino = $model->id_destino;
					$guias->fecha_baja = date('Y-m-d', CDateTimeParser::parse($model->fecha, Yii::app()->locale->getDateFormat('medium')));
					$guias->id_baja = $model->id_baja; 
					$guias->save();
					$model->unsetAttributes();
					$model->fecha = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
					$model->id_baja= Yii::app()->user->id;
				}
				else 
				{
					$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
					    'options'=>array(
					        'title'=>'ERROR',
					        'autoOpen'=>true,
					        'modal'=>true,
					        'width'=>300,
					        'height'=>100,
					    ),
					    ));
					    echo 'La guia no existe';
					$this->endWidget();
					    
					    
				}
					
			}
		}
		
		$this->render('bajas',array('model'=>$model, 'modeladmin'=>$modeladmin));
		
	}
	/**
	 * Reporte Asignados de la fecha
	 * Reporte de guias asignadas en un periodo determinado
	 */
	public function actionAsigxf()
	{
		$model = new ReportesForm();
		
		$model->fecha_ini = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
		$model->fecha_fin = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
		
		if (isset($_POST['ReportesForm']))
		{
			$model->attributes=$_POST['ReportesForm'];
			//$model->fecha_ini = date('Y-m-d', CDateTimeParser::parse($model->fecha_ini, Yii::app()->locale->getDateFormat('medium')));
			if($model->validate())
			{
				$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
				
				$finicial = date('Y-m-d', CDateTimeParser::parse($model->fecha_ini, Yii::app()->locale->getDateFormat('medium')));
				$ffinal   = date('Y-m-d', CDateTimeParser::parse($model->fecha_fin, Yii::app()->locale->getDateFormat('medium')));
				
				$guias = Guias::model()->findAll('fecha_asig >= :fInicial AND fecha_asig <= :fFinal', array(':fInicial'=>$finicial, ':fFinal'=>$ffinal));
				
				$html = $this->renderPartial('_asigxf', array('model'=>$guias), true, true);
				
				$pdf->SetCreator(PDF_CREATOR);
				$pdf->SetAuthor("MMS");
				$pdf->SetTitle("Project's report");
				$pdf->SetSubject("TCPDF Tutorial");
				$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
				//$pdf->SetHeaderData("mms.png", '30', "Project Data", "Date: $var ");
				//$pdf->SetHeaderData2('0',"", "","","","","","", "", "", "C01");
				$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$pdf->SetHeaderMargin(5);
				$pdf->SetFooterMargin(10);
				$pdf->SetTopMargin(25);
				//$pdf->setPrintHeader(true);
				//$pdf->setPrintFooter(True);
				//$pdf->AliasNbPages();
				$pdf->SetAutoPageBreak(TRUE,'16');
				//$pdf->Header();
				$pdf->AddPage();
				//$pdf->SetFont("times", "BI", 10);
				$pdf->writeHTML($html, true, false, false, false, '');
				$pdf->lastPage();
				$pdf->Output("example_002.pdf", "I");
				//return $pdf;
			}
			
		}
		
		$this->render('asigxf',array(
			'model'=>$model,
		));
	}
	
	public function actionAsigxo()
	{
		$model = new ReportesFormOrigen();
		//$model->unsetAttributes();
		
		if (isset($_POST['ReportesFormOrigen']))
		{
			$model->attributes=$_POST['ReportesFormOrigen'];
			
			if($model->validate())
			{	
				$origen = $model->id_origen;
				$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');

				$guias = Guias::model()->findAll('id_origen=:cOrigen',array(':cOrigen'=> $origen));
				
				$html = $this->renderPartial('_asigxo', array('model'=>$guias), true, true);

				$pdf->SetCreator(PDF_CREATOR);
				$pdf->SetAuthor("MMS");
				$pdf->SetTitle("Project's report");
				$pdf->SetSubject("TCPDF Tutorial");
				$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
				//$pdf->SetHeaderData("mms.png", '30', "Project Data", "Date: $var ");
				//$pdf->SetHeaderData2('0',"", "","","","","","", "", "", "C01");
				$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$pdf->SetHeaderMargin(5);
				$pdf->SetFooterMargin(10);
				$pdf->SetTopMargin(25);
				//$pdf->setPrintHeader(true);
				//$pdf->setPrintFooter(True);
				//$pdf->AliasNbPages();
				$pdf->SetAutoPageBreak(TRUE,'16');
				//$pdf->Header();
				$pdf->AddPage();
				//$pdf->SetFont("times", "BI", 10);
				$pdf->writeHTML($html, true, false, false, false, '');
				$pdf->lastPage();
				$pdf->Output("example_002.pdf", "I");
				//return $pdf;
			}
			else 
				$this->render('asigxo',array('model'=>$model, ));
		}
		else 
			$this->render('asigxo',array('model'=>$model, ));
		
	}
	
	public function actionBajxd ()
	{
		
		$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
		$Guias=Guias::model()->findAll('id_baja != :cBaja',array(':cBaja' => 0 ));
		//$html = $this->renderparcial('view', array('model' => $this->loadModel($id)), true, true);
		$html = $this->renderPartial('_bajxd', array('model'=>$Guias), true, true);
		//$var=date('d-M-Y');
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor("MMS");
		$pdf->SetTitle("Project's report");
		$pdf->SetSubject("TCPDF Tutorial");
		$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
		//$pdf->SetHeaderData("mms.png", '30', "Project Data", "Date: $var ");
		//$pdf->SetHeaderData2('0',"", "","","","","","", "", "", "C01");
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetTopMargin(25);
		//$pdf->setPrintHeader(true);
		//$pdf->setPrintFooter(True);
		//$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(TRUE,'16');
		//$pdf->Header();
		$pdf->AddPage();
		//$pdf->SetFont("times", "BI", 10);
		$pdf->writeHTML($html, true, false, false, false, '');
		$pdf->lastPage();
		$pdf->Output("example_002.pdf", "I");
		//return $pdf;
	}

	public function actionBajxf ()
	{
		$model = new ReportesForm();
		
		$model->fecha_ini = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
		$model->fecha_fin = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
		
		if (isset($_POST['ReportesForm']))
		{
			$model->attributes=$_POST['ReportesForm'];
			//$model->fecha_ini = date('Y-m-d', CDateTimeParser::parse($model->fecha_ini, Yii::app()->locale->getDateFormat('medium')));
			if($model->validate())
			{
			
				$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
				$finicial = date('Y-m-d', CDateTimeParser::parse($model->fecha_ini, Yii::app()->locale->getDateFormat('medium')));
				$ffinal   = date('Y-m-d', CDateTimeParser::parse($model->fecha_fin, Yii::app()->locale->getDateFormat('medium')));
				
				$guias = Guias::model()->findAll('fecha_baja >= :fInicial AND fecha_baja <= :fFinal', array(':fInicial'=>$finicial, ':fFinal'=>$ffinal));	
				
				$html = $this->renderPartial('_bajxf', array('model'=>$guias), true, true);
				//$var=date('d-M-Y');
				$pdf->SetCreator(PDF_CREATOR);
				$pdf->SetAuthor("MMS");
				$pdf->SetTitle("Project's report");
				$pdf->SetSubject("TCPDF Tutorial");
				$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
				//$pdf->SetHeaderData("mms.png", '30', "Project Data", "Date: $var ");
				//$pdf->SetHeaderData2('0',"", "","","","","","", "", "", "C01");
				$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$pdf->SetHeaderMargin(5);
				$pdf->SetFooterMargin(10);
				$pdf->SetTopMargin(25);
				//$pdf->setPrintHeader(true);
				//$pdf->setPrintFooter(True);
				//$pdf->AliasNbPages();
				$pdf->SetAutoPageBreak(TRUE,'16');
				//$pdf->Header();
				$pdf->AddPage();
				//$pdf->SetFont("times", "BI", 10);
				$pdf->writeHTML($html, true, false, false, false, '');
				$pdf->lastPage();
				$pdf->Output("example_002.pdf", "I");
				//return $pdf;
			}
		}
				
		$this->render('bajxf',array(
			'model'=>$model,
		));
		
	}
	
	public function actionGuiasd()
	{

		$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
		$guias = Guias::model()->findAll('id_baja=:cBaja',array(':cBaja'=> 0));
		
		$html = $this->renderPartial('_asigxo', array('model'=>$guias), true, true);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor("MMS");
		$pdf->SetTitle("Project's report");
		$pdf->SetSubject("TCPDF Tutorial");
		$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
		//$pdf->SetHeaderData("mms.png", '30', "Project Data", "Date: $var ");
		//$pdf->SetHeaderData2('0',"", "","","","","","", "", "", "C01");
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetTopMargin(25);
		//$pdf->setPrintHeader(true);
		//$pdf->setPrintFooter(True);
		//$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(TRUE,'16');
		//$pdf->Header();
		$pdf->AddPage();
		//$pdf->SetFont("times", "BI", 10);
		$pdf->writeHTML($html, true, false, false, false, '');
		$pdf->lastPage();
		$pdf->Output("example_002.pdf", "I");
		//return $pdf;
	}
	
	public function actionBajxu ()
	{
		$model = new ReportesFormUsuario();
		//$model->unsetAttributes();
		
		if (isset($_POST['ReportesFormUsuario']))
		{
			$model->attributes=$_POST['ReportesFormUsuario'];
			
			if($model->validate())
			{	
			
				$baja = $model->id_baja;
				$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
				$guias=Guias::model()->findAll('id_baja=:cBaja',array(':cBaja'=> $baja));
				//$html = $this->renderparcial('view', array('model' => $this->loadModel($id)), true, true);
				$html = $this->renderPartial('_bajxu', array('model'=>$guias), true, true);
				//$var=date('d-M-Y');
				$pdf->SetCreator(PDF_CREATOR);
				$pdf->SetAuthor("MMS");
				$pdf->SetTitle("Project's report");
				$pdf->SetSubject("TCPDF Tutorial");
				$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
				//$pdf->SetHeaderData("mms.png", '30', "Project Data", "Date: $var ");
				//$pdf->SetHeaderData2('0',"", "","","","","","", "", "", "C01");
				$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$pdf->SetHeaderMargin(5);
				$pdf->SetFooterMargin(10);
				$pdf->SetTopMargin(25);
				//$pdf->setPrintHeader(true);
				//$pdf->setPrintFooter(True);
				//$pdf->AliasNbPages();
				$pdf->SetAutoPageBreak(TRUE,'16');
				//$pdf->Header();
				$pdf->AddPage();
				//$pdf->SetFont("times", "BI", 10);
				$pdf->writeHTML($html, true, false, false, false, '');
				$pdf->lastPage();
				$pdf->Output("example_002.pdf", "I");
				//return $pdf;
			}
			else 
				$this->render('bajxu',array('model'=>$model, ));
		}
		else 
			$this->render('bajxu',array('model'=>$model, ));
			
	}
	
	public function actionGuiasdxo()
	{
		$model = new ReportesFormOrigen();
		//$model->unsetAttributes();
		
		if (isset($_POST['ReportesFormOrigen']))
		{
			$model->attributes=$_POST['ReportesFormOrigen'];
			//$model->scenario ='asigxo';
			
			if($model->validate())
			{	
				$origen = $model->id_origen;
				$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
				
				$guias = Guias::model()->findAll('id_origen=:cOrigen AND id_baja = :cBaja',array(':cOrigen'=> $origen,':cBaja'=>0));
				//$html = $this->renderparcial('view', array('model' => $this->loadModel($id)), true, true);
				$html = $this->renderPartial('_asigxo', array('model'=>$guias), true, true);
				//$var=date('d-M-Y');
				$pdf->SetCreator(PDF_CREATOR);
				$pdf->SetAuthor("MMS");
				$pdf->SetTitle("Project's report");
				$pdf->SetSubject("TCPDF Tutorial");
				$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
				//$pdf->SetHeaderData("mms.png", '30', "Project Data", "Date: $var ");
				//$pdf->SetHeaderData2('0',"", "","","","","","", "", "", "C01");
				$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$pdf->SetHeaderMargin(5);
				$pdf->SetFooterMargin(10);
				$pdf->SetTopMargin(25);
				//$pdf->setPrintHeader(true);
				//$pdf->setPrintFooter(True);
				//$pdf->AliasNbPages();
				$pdf->SetAutoPageBreak(TRUE,'16');
				//$pdf->Header();
				$pdf->AddPage();
				//$pdf->SetFont("times", "BI", 10);
				$pdf->writeHTML($html, true, false, false, false, '');
				$pdf->lastPage();
				$pdf->Output("example_002.pdf", "I");
				//return $pdf;
			}
			else 
				$this->render('guiasdxo',array('model'=>$model, ));
		}
		else 
			$this->render('guiasdxo',array('model'=>$model, ));
		
	}
	
	public function actionCrearepo()
	{
		$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
		$model=Guias::model()->findAll('serie=:cSerie', array(':cSerie'=>'AA'));
		//$html = $this->renderparcial('view', array('model' => $this->loadModel($id)), true, true);
		$html = $this->renderPartial('_catalog', array('model'=>$model), true, true);
		//$var=date('d-M-Y');
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor("MMS");
		$pdf->SetTitle("Project's report");
		$pdf->SetSubject("TCPDF Tutorial");
		$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
		//$pdf->SetHeaderData("mms.png", '30', "Project Data", "Date: $var ");
		//$pdf->SetHeaderData2('0',"", "","","","","","", "", "", "C01");
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetTopMargin(25);
		//$pdf->setPrintHeader(true);
		//$pdf->setPrintFooter(True);
		//$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(TRUE,'16');
		//$pdf->Header();
		$pdf->AddPage();
		//$pdf->SetFont("times", "BI", 10);
		$pdf->writeHTML($html, true, false, false, false, '');
		$pdf->lastPage();
		$pdf->Output("example_002.pdf", "I");
		//return $pdf;
		
	}
}
?>