<?php

/**
 * AsignaForm class.
 * AsignaForm is the data structure for keeping
 * asigna form data. It is used by the 'asigna' action of 'GuiasControler'.
 * 
 * @property string $factura;
 * @property string $serie;
 * @property integer $folio_ini;
 * @property integer $folio_fin;
 * @property integer $zona;
 * @property string $fecha_asig;
 * @property string $asignado;
 * @property integer $id_origen;
 */
class AsignaForm extends CFormModel
{
	public $factura;
	public $serie;
	public $folio_ini;
	public $folio_fin;
	public $zona;
	public $fecha_asig;
	public $asignado;
	public $id_origen;
	
	public function rules()
	{
		return array(
			array('factura, folio_ini, folio_fin, zona, asignado, id_origen', 'required'),
			array('folio_ini, folio_fin, zona, id_origen', 'numerical', 'integerOnly'=>true),
			//array('fecha_asig', 'date', 'format'=>'dd-mm-yy'),
			array('serie', 'length', 'max'=>10),
			array('factura', 'length', 'max'=>20),
			array('folio_fin', 'mayorque'),
		);
	}
	
	public function mayorque($attribute,$params)
	{
		if ($this->folio_fin < $this->folio_ini)
			$this->addError('folio_fin','El folio final debe ser mayor o igual al inicial.');
	}
	
	public function attributeLabels()
	{
		return array(
			'factura'=>'Factura',
			'serie'=>'Serie',
			'folio_ini'=>'Folio Inicial',
			'folio_fin'=>'Folio Final',
			'zona'=>'Zona',
			'fecha_asig'=>'Fecha',
			'asignado'=>'Asignado',
			'id_origen'=>'Origen',
		);
	}
}