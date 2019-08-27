<?php

class DashboardController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
        
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view', 'report', 'clientRevision'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView()
	{        
	    authorized('report.dashboard');

		$report=new Dashboard;
		$customerObj = new ClientUpdate;
		$this->render('index',array('report'=>$report, 'customerObj'=>$customerObj));

	}

	/*
	public function actionReport()
	{        
	    authorized('report.dashboard');

		$report=new Dashboard;
		$customerObj = new ClientUpdate;
		$this->render('report',array('report'=>$report, 'customerObj'=>$customerObj));

	}
	*/
	

	public function actionClientRevision($filter = 1)
    {
        //$this->canViewReport();
        authorized('report.dashboard');

        $grid_id = 'rpt-sale-summary-grid';
        $title = 'Client Revision';

        //$data = $this->commonData($grid_id,$title);
		$model = new ClientUpdate;
		$data['grid_id'] = $grid_id;
		
		

		
		
		

		if($filter == ClientUpdate::REVISION_60DAYS_CUSTOM){
			$data['data_provider'] = $model->getClientRevision60Days();
			$title = $title.' - '.ClientUpdate::BUY_30_60_DAYS;
		}
		else if($filter == ClientUpdate::REVISION_61DAYS_CUSTOM){

			$data['data_provider'] = $model->getClientRevision61Days();
			$title = $title.' - '.ClientUpdate::BUY_60_DAY;
		}
		else if($filter == ClientUpdate::REVISION_91DAYS_CUSTOM){
			$data['data_provider'] = $model->getClientRevision91Days();
			$title = $title.' - '.ClientUpdate::NEVER_BUY;
		}
		else{
			$data['data_provider'] = $model->getClientRevision30Days();
			$filter = 1;
			$title = $title.' - '.ClientUpdate::BUY_LAST_30_DAYS;
		}

		$data['title'] = $title;

		$data['filter'] = $filter;

		$data['grid_columns'] = ClientUpdate::getClientRevisionColumns();

		$data['header_tab'] = ClientUpdate::getClientRevisionHeaderTab($filter);

		

        $this->renderView($data);
	}

	protected function renderView($data)
    {
        if (Yii::app()->request->isAjaxRequest && !isset($_GET['ajax']) ) {
            Yii::app()->clientScript->scriptMap['*.css'] = false;
            Yii::app()->clientScript->scriptMap['*.js'] = false;

            $this->renderPartial('partial/_grid', $data);
        } else {
            $this->render('client_revision', $data);
        }
    }
	

    public function actionAjaxRefresh()
    {
        $report=new Dashboard;
        $this->renderPartial('_index_ajax',array('report'=>$report));
    }

	
}
