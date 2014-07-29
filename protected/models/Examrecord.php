<?php

/**
 * This is the model class for table "examrecord".
 *
 * The followings are the available columns in table 'examrecord':
 * @property integer $examID
 * @property integer $academicsessionID
 * @property integer $examtermID
 * @property integer $subjectID
 * @property integer $classID
 * @property integer $studentID
 * @property string $date
 * @property integer $totalmarks
 * @property double $score
 * @property string $grade
 * @property double $percentage
 * @property string $remarks
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property Academicsession $academicsession
 * @property Examterm $examterm
 * @property Subject $subject
 * @property Classroom $class
 */
class Examrecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Examrecord the static model class
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
		return 'examrecord';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('score', 'required'),
			array('academicsessionID, examtermID, subjectID, classID, studentID, totalmarks', 'numerical', 'integerOnly'=>true),
			array('score, percentage', 'numerical'),
			array('grade', 'length', 'max'=>20),
			array('date, remarks', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('examID, academicsessionID, examtermID, subjectID, classID, studentID, date, totalmarks, score, grade, percentage, remarks', 'safe', 'on'=>'search'),
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
			'academicsession' => array(self::BELONGS_TO, 'Academicsession', 'academicsessionID'),
			'examterm' => array(self::BELONGS_TO, 'Examterm', 'examtermID'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'subjectID'),
			'class' => array(self::BELONGS_TO, 'Classroom', 'classID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'examID' => 'Exam',
			'academicsessionID' => 'Academicsession',
			'examtermID' => 'Examterm',
			'subjectID' => 'Subject',
			'classID' => 'Class',
			'studentID' => 'Student',
			'date' => 'Date',
			'totalmarks' => 'Totalmarks',
			'score' => 'Score',
			'grade' => 'Grade',
			'percentage' => 'Percentage',
			'remarks' => 'Remarks',
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

		$criteria->compare('examID',$this->examID);
		$criteria->compare('academicsessionID',$this->academicsessionID);
		$criteria->compare('examtermID',$this->examtermID);
		$criteria->compare('subjectID',$this->subjectID);
		$criteria->compare('classID',$this->classID);
		$criteria->compare('studentID',$this->studentID);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('totalmarks',$this->totalmarks);
		$criteria->compare('score',$this->score);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('percentage',$this->percentage);
		$criteria->compare('remarks',$this->remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}