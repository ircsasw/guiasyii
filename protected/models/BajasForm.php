<?php

class BajasForm extends CFormModel
{
	public $fecha;
	public $id_destino;
	public $serie;
	public $folio;
	public $id_baja;
	
	public function rules()
	{
		return array(
			array('fecha,id_destino,serie,folio','required'),
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
			'serie'=>'Serie',
			'folio'=>'Folio',
		);
	}
}