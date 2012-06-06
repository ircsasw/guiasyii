<?php

class BajasForm extends CFormModel
{
	public $fecha;
	public $id_destino;
	public $factura;
	public $folio;
	public $id_baja;
	
	public function rules()
	{
		return array(
			array('fecha, id_destino, folio','required'),
			array('fecha', 'date', 'format'=>'d/M/yyyy'),
			
		);
	}
	/*
	public function mayorque($attribute, $params)
	{
		if ($this->fecha_fin < $this->fecha_ini)
			$this->addError('fecha_fin','La fecha final debe ser mayor o igual a la inicial.');
	}*/
	
	public function attributeLabels()
	{
		return array(
			'fecha'=>'Fecha de Baja',
			'id_destino'=>'Destino',
			'factura'=>'Factura',
			'folio'=>'Folio',
		);
	}
}