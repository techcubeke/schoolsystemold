<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property integer $personID
 * @property string $personprofile
 * @property integer $studentID
 * @property integer $staffID
 * @property integer $vendorID
 * @property string $dateadded
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property Vendor $vendor
 * @property Staff $staff
 * @property User[] $users
 */
class Person extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Person the static model class
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
		return 'person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('personprofile', 'required'),
			array('studentID, staffID, vendorID', 'numerical', 'integerOnly'=>true),
			array('personprofile', 'length', 'max'=>50),
			array('dateadded', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('personID, personprofile, studentID, staffID, vendorID, dateadded', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'studentID'),
			'vendor' => array(self::BELONGS_TO, 'Vendor', 'vendorID'),
			'staff' => array(self::BELONGS_TO, 'Staff', 'staffID'),
			'users' => array(self::HAS_MANY, 'User', 'personID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'personID' => 'Person',
			'personprofile' => 'Personprofile',
			'studentID' => 'Student',
			'staffID' => 'Staff',
			'vendorID' => 'Vendor',
			'dateadded' => 'Dateadded',
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

		$criteria->compare('personID',$this->personID);
		$criteria->compare('personprofile',$this->personprofile,true);
		$criteria->compare('studentID',$this->studentID);
		$criteria->compare('staffID',$this->staffID);
		$criteria->compare('vendorID',$this->vendorID);
		$criteria->compare('dateadded',$this->dateadded,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}