<?php

/**
 * This is the model class for table "access".
 *
 * The followings are the available columns in table 'access':
 * @property string $a_id
 * @property string $a_ip
 * @property string $a_date
 * @property string $a_request
 * @property integer $a_answer_code
 * @property integer $a_response_size
 */
class Access extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'access';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('a_ip, a_date, a_request, a_answer_code, a_response_size', 'required'),
			array('a_answer_code, a_response_size', 'numerical', 'integerOnly'=>true),
			array('a_ip', 'length', 'max'=>128),
			array('a_request', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('a_id, a_ip, a_date, a_request, a_answer_code, a_response_size', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'a_id' => 'Id',
			'a_ip' => 'Ip',
			'a_date' => 'Date',
			'a_request' => 'Request',
			'a_answer_code' => 'Code',
			'a_response_size' => 'Size',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{   
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('a_id',$this->a_id,true);
		$criteria->compare('a_ip',$this->a_ip,true);
		$criteria->compare('a_date',$this->a_date,true);
		$criteria->compare('a_request',$this->a_request,true);
		$criteria->compare('a_answer_code',$this->a_answer_code);
		$criteria->compare('a_response_size',$this->a_response_size);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Access the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
