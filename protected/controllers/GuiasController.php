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
			array('allow',  // todos los usuarios pueden:
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // usuarios autenticados pueden:
				'actions'=>array('view', 'bajas'),
				'users'=>array('@'),
			),
			array('allow', // el usuario admin puede:
				'actions'=>array('admin', 'delete', 'create', 'update', 'asigna', 'crearepo', 'asigxf', 'asigxo', 'bajxd', 'bajxf', 'bajxu', 'guiasdxo', 'guiasd'),
				'users'=>array('admin', 'Oscar'),
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
				$factura  = $modelasigna->factura;
				$zona     = $modelasigna->zona;
				$kilaje   = $modelasigna->kilaje;
				$asignado = date('Y-m-d', CDateTimeParser::parse($modelasigna->fecha_asig, Yii::app()->locale->getDateFormat('medium')));

				// Busca el rango de folios y serie
				//$asignadas = Guias::model()->find('folio>= :FolioIni AND folio <= :FolioFin AND serie = :cSerie', array(':FolioIni'=>$inicio, ':FolioFin'=>$fin,':cSerie'=>$serie));
				// Busca si hay guias con la factura y serie+folio inicial
				$elPrimero = $serie.$inicio;
				$asignadas = Guias::model()->find('folio >= :SerieFolioIni AND factura = :Factura', array(':SerieFolioIni'=>$elPrimero, ':Factura'=>$factura));
				/*if (!count($asignadas))
				{*/
					for ( $i=$inicio; $i<=$fin ; $i++)
					{
						$model = new Guias;

						$model->factura    = $factura;
						$model->fecha_asig = $asignado;
						$model->folio      = $serie.$i;
						$model->zona       = $zona;
						$model->kilaje     = $kilaje;
						$model->id_origen  = $origen;
						$model->id_asigna  = $asigna;

						if ( $model->validate() )
							$model->save(false);
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
							echo 'Rango de guias no valido o repetido.';

							$this->endWidget('zii.widgets.jui.CJuiDialog');
							break;
						}
					}

					$modelasigna->unsetAttributes();
					$modelasigna->fecha_asig = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
					$modelasigna->asignado = Yii::app()->user->id;
				/*}
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
				}*/

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
			$msj = "Guia borrada.";
			if(!isset($_GET['ajax']))
			{
				echo CJSON::encode(array(
					'status'=>'failure',
					'respuesta'=>$msj
				));
				exit;
			}
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

	/*
	 *
	 */
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
				//$guias = Guias::model()->find('serie=:cSerie AND folio=:cFolio',array(':cSerie'=>$model->serie,':cFolio'=>$model->folio));
				$guias = Guias::model()->find('folio=:cFolio',array(':cFolio'=>$model->folio));
				// validar que hay resultado
				if (count($guias))
				{
					if ($guias->id_baja == 0)
					{
						$guias->id_destino = $model->id_destino;
						$guias->fecha_baja = date('Y-m-d', CDateTimeParser::parse($model->fecha, Yii::app()->locale->getDateFormat('medium')));
						$guias->id_baja = $model->id_baja;
						$guias->save();
						$model->unsetAttributes();
						$model->fecha = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse(date('Y-m-d'), 'yyyy-MM-dd'),'medium',null);
						$model->id_baja= Yii::app()->user->id;

						$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
						    'options'=>array(
						        'title'=>'Baja correcta',
						        'autoOpen'=>true,
						        'modal'=>true,
						        'width'=>300,
						        'height'=>100,
						    ),
						    ));
						    echo 'La guia se dió de baja.';
						$this->endWidget();
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
						    echo 'La guia ya se dio de baja en: '.$guias->idDestino->destino.' el: '.$guias->fecha_baja;
						$this->endWidget();
					}
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
					    echo 'La guia no existe.';
					$this->endWidget();


				}

			}
		}

		$this->render('bajas',array('model'=>$model));

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
				$finicial = date('Y-m-d', CDateTimeParser::parse($model->fecha_ini, Yii::app()->locale->getDateFormat('medium')));
				$ffinal   = date('Y-m-d', CDateTimeParser::parse($model->fecha_fin, Yii::app()->locale->getDateFormat('medium')));

				$guias = Guias::model()->findAll('fecha_asig >= :fInicial AND fecha_asig <= :fFinal', array(':fInicial'=>$finicial, ':fFinal'=>$ffinal));
				if (count($guias)>0)
				{
					$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
					$html = $this->renderPartial('_asigxf', array('model'=>$guias), true, true);

					$pdf->SetCreator(PDF_CREATOR);
					$pdf->SetAuthor("Control Guias Plus");
					$pdf->SetTitle("Asignaciones de guias del periodo");
					//$pdf->SetSubject("TCPDF Tutorial");
					//$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
					//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);
					$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
					$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
					$pdf->SetHeaderData("", '30', "Asignaciones de guias del periodo", "Periodo: $model->fecha_ini al $model->fecha_fin ");
					//$pdf->SetHeaderData2('0',"", "","","","","","", "", "", "C01");

					$pdf->SetHeaderMargin(5);
					$pdf->SetFooterMargin(10);
					$pdf->SetTopMargin(25);
					//$pdf->setPrintHeader(true);
					//$pdf->setPrintFooter(True);
					//$pdf->AliasNbPages();
					$pdf->SetAutoPageBreak(TRUE,'16');
					//$pdf->Header();
					$pdf->AddPage();
					$pdf->SetFont("times", "", 10);
					$pdf->writeHTML($html, true, false, false, false, '');
					$pdf->lastPage();
					$pdf->Output("example_002.pdf", "I");
					//return $pdf;
				}
				else
				{
					Yii::app()->getUser()->setFlash('notice','No hay datos que mostrar.');
					$this->refresh();
				}
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
				$guias = Guias::model()->findAll('id_origen=:cOrigen',array(':cOrigen'=> $origen));
				$cOrigen = Origenes::model()->findByPk($origen);
				if (count($guias)>0)
				{
					$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
					$html = $this->renderPartial('_asigxo', array('model'=>$guias), true, true);

					$pdf->SetCreator(PDF_CREATOR);
					$pdf->SetAuthor("Control Guias Plus");
					$pdf->SetTitle("Asignaciones de guias del origen");

					$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
					$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
					$pdf->SetHeaderData("", '30', "Asignaciones de guias del origen", "Origen: $cOrigen->origen");

					$pdf->SetHeaderMargin(5);
					$pdf->SetFooterMargin(10);
					$pdf->SetTopMargin(25);
					$pdf->SetAutoPageBreak(TRUE,'16');
					$pdf->AddPage();
					$pdf->SetFont("times", "", 10);
					$pdf->writeHTML($html, true, false, false, false, '');
					$pdf->lastPage();
					$pdf->Output("example_002.pdf", "I");
				}
				else
				{
					Yii::app()->getUser()->setFlash('notice','No hay datos que mostrar.');
					$this->refresh();
				}
			}
		}

		$this->render('asigxo',
			array('model'=>$model,
		));

	}

	public function actionBajxd ()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "id_baja != 0";
		$criteria->order = "id_destino, fecha_baja";
		$Guias=Guias::model()->findAll($criteria);
		//$Guias=Guias::model()->findAll('id_baja != :cBaja', array(':cBaja' => 0 ));
		if (count($Guias)>0)
		{
			$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
			$html = $this->renderPartial('_bajxd', array('model'=>$Guias), true, true);

			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor("Control Guias Plus");
			$pdf->SetTitle("Bajas por destino");

			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			$pdf->SetHeaderData("", '30', "Bajas agrupadas por destino", "");

			$pdf->SetHeaderMargin(5);
			$pdf->SetFooterMargin(10);
			$pdf->SetTopMargin(25);
			$pdf->SetAutoPageBreak(TRUE,'16');
			$pdf->AddPage();
			$pdf->SetFont("times", "", 10);
			$pdf->writeHTML($html, true, false, false, false, '');
			$pdf->lastPage();
			$pdf->Output("example_002.pdf", "I");
		}
		else
		{
			Yii::app()->getUser()->setFlash('notice','No hay datos que mostrar.');
			$this->redirect('index.php?r=site/reportes');
		}
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
				$finicial = date('Y-m-d', CDateTimeParser::parse($model->fecha_ini, Yii::app()->locale->getDateFormat('medium')));
				$ffinal   = date('Y-m-d', CDateTimeParser::parse($model->fecha_fin, Yii::app()->locale->getDateFormat('medium')));

				$guias = Guias::model()->findAll('fecha_baja >= :fInicial AND fecha_baja <= :fFinal', array(':fInicial'=>$finicial, ':fFinal'=>$ffinal));
				if (count($guias)>0)
				{
					$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
					$html = $this->renderPartial('_bajxf', array('model'=>$guias), true, true);

					$pdf->SetCreator(PDF_CREATOR);
					$pdf->SetAuthor("Control Guias Plus");
					$pdf->SetTitle("Bajas de guias del periodo");

					$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
					$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
					$pdf->SetHeaderData("", '30', "Bajas de guias del periodo", "Periodo: $model->fecha_ini al $model->fecha_fin ");

					$pdf->SetHeaderMargin(5);
					$pdf->SetFooterMargin(10);
					$pdf->SetTopMargin(25);
					$pdf->SetAutoPageBreak(TRUE,'16');
					$pdf->AddPage();
					$pdf->SetFont("times", "", 10);
					$pdf->writeHTML($html, true, false, false, false, '');
					$pdf->lastPage();
					$pdf->Output("example_002.pdf", "I");
				}
				else
				{
					Yii::app()->getUser()->setFlash('notice','No hay datos que mostrar.');
					$this->refresh();
				}
			}
		}

		$this->render('bajxf',array(
			'model'=>$model,
		));

	}

	public function actionGuiasd()
	{
		$guias = Guias::model()->findAll('id_baja=:cBaja',array(':cBaja'=> 0));
		if (count($guias)>0)
		{
			$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
			$html = $this->renderPartial('_asigxo', array('model'=>$guias), true, true);

			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor("Control Guias Plus");
			$pdf->SetTitle("Guias disponibles");

			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			$pdf->SetHeaderData("", '30', "Guias disponibles", "");

			$pdf->SetHeaderMargin(5);
			$pdf->SetFooterMargin(10);
			$pdf->SetTopMargin(25);
			$pdf->SetAutoPageBreak(TRUE,'16');
			$pdf->AddPage();
			$pdf->SetFont("times", "", 10);
			$pdf->writeHTML($html, true, false, false, false, '');
			$pdf->lastPage();
			$pdf->Output("example_002.pdf", "I");
		}
		else
		{
			Yii::app()->getUser()->setFlash('notice','No hay datos que mostrar.');
			$this->redirect('index.php?r=site/reportes');
		}
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
				$guias = Guias::model()->findAll('id_baja=:cBaja',array(':cBaja'=> $baja));
				$cUsuario = Usuarios::model()->findByPk($baja);
				if (count($guias)>0)
				{
					$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
					$html = $this->renderPartial('_bajxu', array('model'=>$guias), true, true);

					$pdf->SetCreator(PDF_CREATOR);
					$pdf->SetAuthor("Control Guias Plus");
					$pdf->SetTitle("Bajas de guias por usuario");

					$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
					$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
					$pdf->SetHeaderData("", '30', "Bajas de guias por usuario", "Usuario: $cUsuario->nombre");

					$pdf->SetHeaderMargin(5);
					$pdf->SetFooterMargin(10);
					$pdf->SetTopMargin(25);
					$pdf->SetAutoPageBreak(TRUE,'16');
					$pdf->AddPage();
					$pdf->SetFont("times", "", 10);
					$pdf->writeHTML($html, true, false, false, false, '');
					$pdf->lastPage();
					$pdf->Output("example_002.pdf", "I");
				}
				else
				{
					Yii::app()->getUser()->setFlash('notice','No hay datos que mostrar.');
					$this->refresh();
				}
			}
		}

		$this->render('bajxu',
			array('model'=>$model,
		));

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
				$guias = Guias::model()->findAll('id_origen=:cOrigen AND id_baja = :cBaja',array(':cOrigen'=> $origen,':cBaja'=>0));
				$cOrigen = Origenes::model()->findByPk($origen);
				if (count($guias)>0)
				{
					$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
					$html = $this->renderPartial('_asigxo', array('model'=>$guias), true, true);

					$pdf->SetCreator(PDF_CREATOR);
					$pdf->SetAuthor("Control Guias Plus");
					$pdf->SetTitle("Guias disponibles del origen");

					$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
					$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
					$pdf->SetHeaderData("", '30', "Guias disponibles del origen", "Origen: $cOrigen->origen");

					$pdf->SetHeaderMargin(5);
					$pdf->SetFooterMargin(10);
					$pdf->SetTopMargin(25);
					$pdf->SetAutoPageBreak(TRUE,'16');
					$pdf->AddPage();
					$pdf->SetFont("times", "", 10);
					$pdf->writeHTML($html, true, false, false, false, '');
					$pdf->lastPage();
					$pdf->Output("example_002.pdf", "I");
				}
				else
				{
					Yii::app()->getUser()->setFlash('notice','No hay datos que mostrar.');
					$this->refresh();
				}
			}
		}

		$this->render('guiasdxo',
			array('model'=>$model,
		));

	}

	public function actionCrearepo()
	{
		$model=Guias::model()->findAll('serie=:cSerie', array(':cSerie'=>'AA'));

		$pdf = yii::createComponent('application.extensions.tcpdf.ETcPdf','P','mm','A4',true,'UTF-8');
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