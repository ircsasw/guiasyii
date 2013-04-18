<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest== false) 
		{
			/* 
			 * Realiza los cálculos para las gráficas y las barras
			 */
			
			// Total de guias en la base de datos
			$totalGuias = Guias::model()->count();
			
			// - porcentaje de guias disponibles
			$disponibles = Guias::model()->count('id_destino = 0');
			
			// - TOP 3 de asignaciones por origen
			$top3 = Yii::app()->db->createCommand()
				->select('b.origen, count(a.id_origen) as totasig')
				->from('guias AS a, origenes AS b')
				->where('a.id_origen = b.id')
				->order('totasig DESC')
				->limit(3)
				->group('id_origen')
				->queryAll();
			//var_dump($top3); die();
			
			// - Total de bajas por mes del año actual
			$bajxmes = Yii::app()->db->createCommand()
				->select('MONTH(fecha_baja) as mes, COUNT(fecha_baja) as total')
				->from('guias')
				->where('id_destino>0 AND YEAR(fecha_baja)=:anio', array('anio'=>date('Y')))
				->group('MONTH(fecha_baja)')
				->queryAll();
			//var_dump($bajxmes); die();
			
			// - Total de asignaciones por mes del año actual
			$asixmes = Yii::app()->db->createCommand()
				->select('MONTH(fecha_asig) as mes, COUNT(fecha_asig) as total')
				->from('guias')
				->where('YEAR(fecha_asig)=:anio', array('anio'=>date('Y')))
				->group('MONTH(fecha_asig)')
				->queryAll();
			//var_dump($asixmes); die();
			
			$asi_baj = array(
				'Ene'=>array(),
				'Feb'=>array(),
				'Mar'=>array(),
				'Abr'=>array(),
				'May'=>array(),
				'Jun'=>array(),
				'Jul'=>array(),
				'Ago'=>array(),
				'Sep'=>array(),
				'Oct'=>array(),
				'Nov'=>array(),
				'Dic'=>array(),
			);
			
			$this->render('index', array('totalGuias'=>$totalGuias, 'disponibles'=>$disponibles, 'top3'=>$top3, 'bajxmes'=>$bajxmes, 'asixmes'=>$asixmes));
		}
		else 
		{
			//Yii::app()->language = 'es';	// Define el lenguaje a aplicar en este form
		
			$model=new LoginForm;
	
			// if it is ajax validation request
			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
	
			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				$model->attributes=$_POST['LoginForm'];
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login())
					$this->redirect(Yii::app()->user->returnUrl);
			}
			// display the login form
			$this->render('login',array('model'=>$model));
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Gracias por contactar con nosotros. Nosotros le responderemos tan pronto como sea posible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
	/**
	 * 
	 */
	public function actionReportes()
	{
		$this->render('reportes');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	/**
	 * 
	 */
	public function actionAbout()
	{
		$this->render('pages/about');
	}
}