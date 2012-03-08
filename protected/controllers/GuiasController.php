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
				'actions'=>array('create','update', 'asigna', 'crearepo'),
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

		$this->render('create',array(
			'model'=>$model,
		));
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
	public function actionAsigna()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$modeladmin = new Guias('search');
		$modeladmin->unsetAttributes();  // clear any default values
		if(isset($_GET['Guias']))
			$modeladmin->attributes=$_GET['Guias'];

		if(isset($_POST['folio_ini']))
		{
			$inicio = $_POST['folio_ini'];
			$fin = $_POST['folio_fin'];
			if ($inicio > $fin)
				echo "Error!!!";
			else 
			{
				for ( $i = $inicio;$i<=$fin ; $i++)
				{
					$model = new Guias;
					$model->serie = $_POST['serie'];
					$model->fecha_asig = $_POST['fecha_asig'];
					$model->folio = $i;
					$model->id_origen = $_POST['id_origen'];
					$model->id_asigna = $_POST['id_asigna'];
					$model->save();
				}
				$this->render('asigna', array('model'=>$model, 'modeladmin'=>$modeladmin));
			}
		}
		$this->render('asigna', array('model'=>$model, 'modeladmin'=>$modeladmin));
	
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
}
?>