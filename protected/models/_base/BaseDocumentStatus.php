<?php

/**
 * This is the model base class for the table "document_status".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "DocumentStatus".
 *
 * Columns in table "document_status" available as properties of the model,
 * followed by relations of table "document_status" available as properties of the model.
 *
 * @property integer $id
 * @property string $status_description
 * @property string $status_type
 *
 * @property DocumentReceiver[] $documentReceivers
 * @property IncDocument[] $incDocuments
 */
abstract class BaseDocumentStatus extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'document_status';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'DocumentStatus|DocumentStatuses', $n);
	}

	public static function representingColumn() {
		return 'status_description';
	}

	public function rules() {
		return array(
			array('status_description, status_type', 'required'),
			array('status_description', 'length', 'max'=>255),
			array('status_type', 'length', 'max'=>3),
			array('id, status_description, status_type', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'documentReceivers' => array(self::HAS_MANY, 'DocumentReceiver', 'document_status_id'),
			'incDocuments' => array(self::HAS_MANY, 'IncDocument', 'document_status_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'status_description' => Yii::t('app', 'Status Description'),
			'status_type' => Yii::t('app', 'Status Type'),
			'documentReceivers' => null,
			'incDocuments' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('status_description', $this->status_description, true);
		$criteria->compare('status_type', $this->status_type, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}