<?php

/**
 * This is the model base class for the table "out_document".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "OutDocument".
 *
 * Columns in table "out_document" available as properties of the model,
 * followed by relations of table "out_document" available as properties of the model.
 *
 * @property integer $document_id
 * @property string $out_document_no
 *
 * @property DocumentReceiver[] $documentReceivers
 * @property Document $document
 */
abstract class BaseOutDocument extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'out_document';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'OutDocument|OutDocuments', $n);
	}

	public static function representingColumn() {
		return 'out_document_no';
	}

	public function rules() {
		return array(
			array('document_id, out_document_no', 'required'),
			array('document_id', 'numerical', 'integerOnly'=>true),
			array('out_document_no', 'length', 'max'=>17),
			array('document_id, out_document_no', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'documentReceivers' => array(self::HAS_MANY, 'DocumentReceiver', 'out_document_id'),
			'document' => array(self::BELONGS_TO, 'Document', 'document_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'document_id' => null,
			'out_document_no' => Yii::t('app', 'Out Document No'),
			'documentReceivers' => null,
			'document' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('document_id', $this->document_id);
		$criteria->compare('out_document_no', $this->out_document_no, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}