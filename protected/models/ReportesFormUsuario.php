<?php

/**
 * ReportesForm class.
 * ReportesForm is the data structure for keeping
 * reportes form data. It is used by the 'asigxf', '' actions of 'GuiasControler'.
 */
class ReportesFormUsuario extends CFormModel
{
	public $id_baja;
	
	public function rules()
	{
		return array(
			array('id_baja','required'),
		);
	}
	
	
	public function attributeLabels()
	{
		return array(
			'id_baja'=>'Usuario Baja',
		);
	}
}