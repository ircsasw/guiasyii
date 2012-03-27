<?php

/**
 * This is the model class for table "guias".
 *
 * The followings are the available columns in table 'guias':
 * @property integer $id
 * @property string $serie
 * @property integer $folio
 * @property string $fecha_asig
 * @property integer $id_origen
 * @property integer $id_asigna
 * @property string $fecha_baja
 * @property integer $id_destino
 * @property integer $id_baja
 */
class Guias extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @return Guias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'guias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		//	array('fecha_asig','fecha_baja','date','format'=>'d/M/yyyy'),
			array('serie, fecha_asig, id_origen, id_asigna', 'required'),
			array('folio, id_origen, id_asigna, id_destino, id_baja', 'numerical', 'integerOnly'=>true),
			array('serie', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, serie, folio, fecha_asig, id_origen, id_asigna, fecha_baja, id_destino, id_baja', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUsuarioA' => array(self::BELONGS_TO, 'Usuarios', 'id_asigna'),
			'idUsuarioB' => array(self::BELONGS_TO, 'Usuarios', 'id_baja'),
			'idOrigen' => array(self::BELONGS_TO, 'Origenes', 'id_origen'),
			'idDestino' => array(self::BELONGS_TO, 'Destinos', 'id_destino'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'serie' => 'Serie',
			'folio' => 'Folio',
			'fecha_asig' => 'Fecha de Asignación',
			'id_origen' => 'Origen',
			'id_asigna' => 'Asignó',
			'fecha_baja' => 'Fecha de Baja',
			'id_destino' => 'Destino',
			'id_baja' => 'Dió baja',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('fecha_asig',$this->fecha_asig,true);
		$criteria->compare('id_origen',$this->id_origen);
		$criteria->compare('id_asigna',$this->id_asigna);
		$criteria->compare('fecha_baja',$this->fecha_baja,true);
		$criteria->compare('id_destino',$this->id_destino);
		$criteria->compare('id_baja',$this->id_baja);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>25,
			),
		));
	}
}