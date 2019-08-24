# HF Dashboard
homefood dashboard development repository'

##Clone code into your own local environment

git clone https://github.com/soklux/homefood-db.git

[Dashboard](https://drive.google.com/file/d/1CJJIr3jFr08udAC40NWvzNR3bMvBRd3k/view?usp=sharing)

* Model located in protected/models/Dashboard.php
* View located in protected/views/dashboard/index.php
* Control location in protected/controller/DashboardController.php

##DashboardController controller
public function actionView()
{        
	    authorized('report.dashboard');
      
      $report=new Dashboard;
      $this->render('index',array('report'=>$report));
}

* *Block of Code's Explaination*
* $report=new Dashboard; -- reference Dashobard model

* $this->render('index',array('report'=>$report)); -- render view index (protected/views/dashboard/index.php) & pass report / Dashboard model data to index view

##Dashboard model

###Dashboard model a function explain
public function totalSaleSPD($interval=0)
{
    $sql = "SELECT IFNULL(SUM(sub_total),0) sale_amount
            FROM v_sale
            WHERE sale_time>=CURDATE() - :interval
            AND `status`=:status";

    $result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':status' => Yii::app()->params['sale_complete_status'] ,  ':interval' => (int) $interval));

    foreach ($result as $record) {
        $result = $record['sale_amount'];
    }

    return number_format($result,Common::getDecimalPlace());
}
* Sum(sub_total) from view v_sale where sale_status=sale_complete_status and return result reset to display in index.php view
