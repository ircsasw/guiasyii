<?php

/**
 * AsignaForm class.
 * AsignaForm is the data structure for keeping
 * asigna form data. It is used by the 'asigna' action of 'GuiasControler'.
 */
class AsignaForm extends CFormModel
{
	public $serie;
	public $folio_ini;
	public $folio_fin;
	public $fecha_asig;
	public $asignado;
	public $id_origen;
	
	public function rules()
	{
		return array(
			// username and password are required
			array('serie, folio_ini, folio_fin, asignado, id_origen', 'required'),
			array('folio_ini, folio_fin, id_origen', 'numerical', 'integerOnly'=>true),
			//array('fecha_asig', 'date', 'format'=>'yyyy-M-d'),
			array('serie', 'length', 'max'=>10),
			array('folio_fin', 'mayorque'),
		);
	}
	
	public function mayorque($attribute,$params)
	{
		if ($this->folio_fin < $this->folio_ini)
			$this->addError('folio_fin','El folio final debe ser mayor al inicial.');
	}
	
	public function attributeLabels()
	{
		return array(
			'serie'=>'Serie',
			'folio_ini'=>'Folio Inicial',
			'folio_fin'=>'Folio Final:',
			'fecha_asig'=>'Fecha',
			'asignado'=>'Asignado',
			'id_origen'=>'Origen',
		);
	}
}