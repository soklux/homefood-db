<?php

/**
 * This is the model class for table "client_update".
 *
 * The followings are the available columns in table 'client_update':
 * @property integer $client_id
 * @property string $first_purchase_date
 * @property string $last_purchase_date
 * @property string $first_payment_date
 * @property string $last_payment_date
 * @property string $total
 */
class ClientUpdate extends CActiveRecord
{

	const REVISION_30DAYS_CUSTOM = 1;
    const REVISION_60DAYS_CUSTOM = 2;
    const REVISION_61DAYS_CUSTOM = 3;
	const REVISION_91DAYS_CUSTOM = 4;
	
	const BUY_LAST_30_DAYS = 'Buy last 30 days';
	const BUY_30_60_DAYS = 'Buy 30-60';
	const BUY_60_DAY = '61 day';
	const NEVER_BUY = 'Never buy at all';
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_update';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_id', 'required'),
			array('client_id', 'numerical', 'integerOnly'=>true),
			array('total', 'length', 'max'=>15),
			array('first_purchase_date, last_purchase_date, first_payment_date, last_payment_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('client_id, first_purchase_date, last_purchase_date, first_payment_date, last_payment_date, total', 'safe', 'on'=>'search'),
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
			'client_id' => 'Client',
			'first_purchase_date' => 'First Purchase Date',
			'last_purchase_date' => 'Last Purchase Date',
			'first_payment_date' => 'First Payment Date',
			'last_payment_date' => 'Last Payment Date',
			'total' => 'Total',
		);
	}

	public static function getClientRevisionColumns()
    {
        return array(
            array('name' => 'client_id',
                'header' => Yii::t('app', 'Client ID'),
                'value' => '$data["client_id"]',
                'headerHtmlOptions' => array('style' => 'text-align: right;'),
                'htmlOptions' => array('style' => 'text-align: right;'),
			),

			array('name' => 'fullname',
                'header' => Yii::t('app', 'Full Name'),
                'value' => '$data["fullname"]',
                'headerHtmlOptions' => array('style' => 'text-align: right;'),
                'htmlOptions' => array('style' => 'text-align: right;'),
			),
			
			array('name' => 'first_purchase_date',
                'header' => Yii::t('app', 'First Purchase Date'),
                'value' => 'date("d-m-Y", strtotime($data["first_purchase_date"]))',
                'headerHtmlOptions' => array('style' => 'text-align: right;'),
                'htmlOptions' => array('style' => 'text-align: right;'),
			),
			
			array('name' => 'last_purchase_date',
                'header' => Yii::t('app', 'Last Purchase Date'),
                'value' => 'date("d-m-Y", strtotime($data["last_purchase_date"]))',
                'headerHtmlOptions' => array('style' => 'text-align: right;'),
                'htmlOptions' => array('style' => 'text-align: right;'),
			),

			array('name' => 'number_of_days',
                'header' => Yii::t('app', 'Number of days'),
                'value' => '$data["number_of_days"]',
                'headerHtmlOptions' => array('style' => 'text-align: right;'),
                'htmlOptions' => array('style' => 'text-align: right;'),
			),
			
			array('name' => 'first_payment_date',
                'header' => Yii::t('app', 'First Payment Date'),
                'value' =>  '$data["first_payment_date"] !=null ? date("d-m-Y", strtotime($data["first_payment_date"])) : ""',
                'headerHtmlOptions' => array('style' => 'text-align: right;'),
                'htmlOptions' => array('style' => 'text-align: right;'),
			),
			
			array('name' => 'last_payment_date',
                'header' => Yii::t('app', 'Last Payment Date'),
                'value' =>'$data["last_payment_date"] !=null ? date("d-m-Y", strtotime($data["last_payment_date"])) : ""',
                'headerHtmlOptions' => array('style' => 'text-align: right;'),
                'htmlOptions' => array('style' => 'text-align: right;'),
			),
			
			array('name' => 'total',
                'header' => Yii::t('app', 'Total'),
                'value' => '$data["total"]',
                'headerHtmlOptions' => array('style' => 'text-align: right;'),
                'htmlOptions' => array('style' => 'text-align: right;'),
            ),
           
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

		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('first_purchase_date',$this->first_purchase_date,true);
		$criteria->compare('last_purchase_date',$this->last_purchase_date,true);
		$criteria->compare('first_payment_date',$this->first_payment_date,true);
		$criteria->compare('last_payment_date',$this->last_payment_date,true);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientUpdate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public static function getClientRevisionHeaderTab($filter)
    {
		
        return array(
            array('label' => Yii::t('app', ClientUpdate::BUY_LAST_30_DAYS), 'url' => Yii::app()->urlManager->createUrl('dashboard/clientRevision', array('filter' => '1')), 'active' => 1==$filter),
            array('label' => Yii::t('app', ClientUpdate::BUY_30_60_DAYS), 'url' => Yii::app()->urlManager->createUrl('dashboard/clientRevision', array('filter' => '2')), 'active' => 2==$filter),
            array('label' => Yii::t('app', ClientUpdate::BUY_60_DAY), 'url' => Yii::app()->urlManager->createUrl('dashboard/clientRevision', array('filter' => '3')), 'active' => 3==$filter),
            array('label' => Yii::t('app', ClientUpdate::NEVER_BUY), 'url' => Yii::app()->urlManager->createUrl('dashboard/clientRevision', array('filter' => '4')), 'active' => 4==$filter),
        );
	}
	

	public function getTest(){

        //first insert
        // $sql0 = "SELECT DISTINCT(`client_id`) id FROM `sale` WHERE `status`=1";
        // $result0 = Yii::app()->db->createCommand($sql0)->queryAll();

        // foreach ($result0 as $record){
        //     $clientUpdate = new ClientUpdate();
        //     $clientUpdate->client_id = $record['id'];
        //     $clientUpdate->save();
        // }

        // die('Done!');

        $sql = "SELECT `client_id` FROM `client_update`";

        $result = Yii::app()->db->createCommand($sql)->queryAll();

        foreach ($result as $record) {
            $id = $record['client_id'];
            
            //last purchase record of a client
            // $sql2 = "SELECT `sale_time` last_purchase FROM `sale` WHERE `client_id` = $id AND `status` =1 ORDER BY `sale_time` DESC LIMIT 1";
            // $result2 = Yii::app()->db->createCommand($sql2)->queryRow();
            //print_r($result2); die();



            //first purchase record of a client
            // $sql3 = "SELECT `sale_time` first_purchase FROM `sale` WHERE `client_id` = $id AND `status` =1 ORDER BY `sale_time` ASC LIMIT 1";
            // $result3 = Yii::app()->db->createCommand($sql3)->queryRow();
            //print_r($result3); die();

            //For Total amount of purchase
            // $sql4 = "SELECT SUM(`sub_total`) sub_total FROM `sale` WHERE `client_id`=$id AND `status` =1";
            // $result4 = Yii::app()->db->createCommand($sql4)->queryRow();
            //print_r($result4); die();

            // $sqlPL = "SELECT `date_paid` pl FROM `sale_payment` INNER JOIN `sale` ON `sale`.`id`=`sale_payment`.`sale_id` WHERE `sale`.`status`=1 AND `sale`.`client_id`=$id ORDER BY `date_paid` DESC LIMIT 1";
            // $resultPL = Yii::app()->db->createCommand($sqlPL)->queryRow();

            // if($resultPL != NULL){
            //     $model = ClientUpdate::model()->findByPk($id);
            //     $model->last_payment_date = $resultPL['pl'];
            //     $model->save();
            // }

            // $sqlPF = "SELECT `date_paid` pf FROM `sale_payment` INNER JOIN `sale` ON `sale`.`id`=`sale_payment`.`sale_id` WHERE `sale`.`status`=1 AND `sale`.`client_id`=$id ORDER BY `date_paid` ASC LIMIT 1";
            // $resultPF = Yii::app()->db->createCommand($sqlPF)->queryRow();

            // if($resultPF != NULL){
            //     $model1 = ClientUpdate::model()->findByPk($id);
            //     $model1->first_payment_date = $resultPF['pf'];
            //     $model1->save();
            // }




            //$model = ClientUpdate::model()->findByPk($id);
            // $model->total = $result4['sub_total'];
            // $model->last_purchase_date = $result2['last_purchase'];
            // $model->first_purchase_date = $result3['first_purchase'];
            
            
           // $model->save();

        }

        //echo "Done!"; die();

        



    }

    public function get30DaysCustomers(){

        $sql = "SELECT COUNT(`client_id`) n_30_day_customer FROM `client_update` WHERE `last_purchase_date` BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        
        return $result['n_30_day_customer'];
	}
	
	
	public function getClientRevision30Days(){

		$sql = "SELECT c.`first_name` fullname,  cu.*, DATEDIFF(NOW(), cu.`last_purchase_date`) number_of_days FROM `client_update` cu INNER JOIN `client` c ON cu.client_id=c.id WHERE cu.`last_purchase_date` BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

		$dataProvider = new CArrayDataProvider($rawData, array(
            'keyField' => 'client_id',
            'pagination' => false,
        ));

        return $dataProvider;
	}

    public function get60DaysCustomers(){

        $sql = "SELECT COUNT(`client_id`) n_60_day_customer FROM `client_update` WHERE `last_purchase_date` BETWEEN DATE_SUB(NOW(), INTERVAL 60 DAY)
        AND DATE_SUB(NOW(), INTERVAL 31 DAY)";
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        
        return $result['n_60_day_customer'];
	}
	
	public function getClientRevision60Days(){

		$sql = "SELECT c.`first_name` fullname,  cu.*, DATEDIFF(NOW(), cu.`last_purchase_date`) number_of_days FROM `client_update` cu INNER JOIN `client` c ON cu.client_id=c.id  WHERE cu.`last_purchase_date` BETWEEN DATE_SUB(NOW(), INTERVAL 60 DAY)
        AND DATE_SUB(NOW(), INTERVAL 31 DAY)";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

		$dataProvider = new CArrayDataProvider($rawData, array(
            'keyField' => 'client_id',
            'pagination' => false,
        ));

        return $dataProvider;
	}

    public function get61DaysCustomers(){
        
        $completed_status = Yii::app()->params['sale_complete_status'];

        $sql = "SELECT COUNT(`client_id`) n_61_day_customer FROM `client_update` WHERE `last_purchase_date` BETWEEN DATE_SUB(NOW(), INTERVAL 90 DAY) AND DATE_SUB(NOW(), INTERVAL 61 DAY)";

        $result = Yii::app()->db->createCommand($sql)->queryRow();
        
        return $result['n_61_day_customer'];
	}
	
	public function getClientRevision61Days(){

		$sql = "SELECT c.`first_name` fullname,  cu.*, DATEDIFF(NOW(), cu.`last_purchase_date`) number_of_days 
				FROM `client_update` cu INNER JOIN `client` c ON cu.client_id=c.id  WHERE cu.`last_purchase_date` BETWEEN DATE_SUB(NOW(), INTERVAL 90 DAY) AND DATE_SUB(NOW(), INTERVAL 61 DAY)";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

		$dataProvider = new CArrayDataProvider($rawData, array(
            'keyField' => 'client_id',
            'pagination' => false,
        ));

        return $dataProvider;
	}

    public function get91DaysCustomers(){
        
        $completed_status = Yii::app()->params['sale_complete_status'];

        $sql = "SELECT COUNT(`client_id`) n_91_day_customer FROM `client_update` WHERE `last_purchase_date` < DATE_SUB(NOW(), INTERVAL 90 DAY)";

        $result = Yii::app()->db->createCommand($sql)->queryRow();
        return $result['n_91_day_customer'];
	}
	
	public function getClientRevision91Days(){

		$sql = "SELECT c.`first_name` fullname,  cu.*, DATEDIFF(NOW(), cu.`last_purchase_date`) number_of_days FROM `client_update` cu INNER JOIN `client` c ON cu.client_id=c.id  WHERE cu.`last_purchase_date` < DATE_SUB(NOW(), INTERVAL 90 DAY)";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

		$dataProvider = new CArrayDataProvider($rawData, array(
            'keyField' => 'client_id',
            'pagination' => false,
        ));

        return $dataProvider;
	}
}
