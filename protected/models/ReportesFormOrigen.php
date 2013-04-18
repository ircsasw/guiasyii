<?php

/**
 * ReportesForm class.
 * ReportesForm is the data structure for keeping
 * reportes form data. It is used by the 'asigxf', '' actions of 'GuiasControler'.
 */
class ReportesFormOrigen extends CFormModel
{
	public $id_origen;
	
	public function rules()
	{
		return array(
			array('id_origen','required'),
		);
	}
	
	
	public function attributeLabels()
	{
		return array(
			'id_origen'=>'Origen',
		);
	}
}