<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $usuario
 * @property string $pass
 * @property string $nombre
 */
class Usuarios extends CActiveRecord
{
	public function validatePassword($pass)
	{
		return $this->hashPassword($pass)===$this->pass;
	}
	
	public function hashPassword($pass)
	{
		return md5($pass);
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuarios the static model class
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
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, pass, nombre', 'required'),
			array('usuario', 'unique'),
			array('usuario', 'length', 'max'=>40),
			array('pass', 'length', 'max'=>100),
			array('nombre', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usuario, pass, nombre', 'safe', 'on'=>'search'),
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
			'asignadas' => array(self::HAS_MANY, 'Guias', 'id_asigna'),
			'bajadas' => array(self::HAS_MANY, 'Guias', 'id_baja'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Clave',
			'usuario' => 'Usuario',
			'pass' => 'Contraseña',
			'nombre' => 'Nombre',
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
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('nombre',$this->nombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * @return array flash message keys array
	 */
	public function getFlashKeys()
	{
	    $counters=$this->getState(self::FLASH_COUNTERS);
	    if(!is_array($counters)) return array();
	    return array_keys($counters);
	}
}