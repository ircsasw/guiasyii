<?php

/**
 * ReportesForm class.
 * ReportesForm is the data structure for keeping
 * reportes form data. It is used by the 'asigxf', '' actions of 'GuiasControler'.
 */
class ReportesForm extends CFormModel
{
	public $fecha_ini;
	public $fecha_fin;
	public $id_origen;
	
	public function rules()
	{
		return array(
			array('fecha_ini,fecha_fin','required','on'=>'asigxf'),
			array('id_origen', 'required', 'on'=>'asigxo'),
			array('fecha_ini, fecha_fin', 'date', 'format'=>'d/M/yyyy'),
			array('fecha_fin', 'mayorque', 'on'=>'asigxf'),
		);
	}
	
	public function mayorque($attribute, $params)
	{
		if ($this->fecha_fin < $this->fecha_ini)
			$this->addError('fecha_fin','La fecha final debe ser mayor o igual a la inicial.');
	}
	
	public function attributeLabels()
	{
		return array(
			'fecha_ini'=>'Fecha Inicial',
			'fecha_fin'=>'Fecha Final:',
			'id_origen'=>'Origen',
		);
	}
}