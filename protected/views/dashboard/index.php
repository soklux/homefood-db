<?php
$this->breadcrumbs=array(
    sysMenuDashboard()
);
?>
<?php
    $date = array();
    $sub_total = array();
    $total = array();
    foreach($report->saleDailyChart() as $record)
    {
        $date[] = $record["date"];
        $sub_total[] = floatval($record["sub_total"]);
        $total[] = floatval($record["total"]);
    }
?>
    <div class="">
            <div class="row">
                <!--PAGE CONTENT BEGINS-->
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12 widget-container-col summary_header">
                            <div class="infobox infobox-green">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-money"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?=  $report->totalSaleSPD(); ?></span>
                                    <div class="infobox-content"><?= CHtml::link('Today\'s Sale', Yii::app()->createUrl("report/SaleDaily")); ?></div>
                                </div>
                            </div>

                            <div class="infobox infobox-purple">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-money"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?= $report->totalSale2Date('WEEK'); ?></span>

                                    <div class="infobox-content">This Week Sales</div>
                                </div>
                            </div>

                            <div class="infobox infobox-pink">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-money"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?= $report->totalSale2Date('MONTH'); ?></span>

                                    <div class="infobox-content">This Month Sales</div>
                                </div>
                            </div>

                            <div class="infobox infobox-blue">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-money"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?= $report->totalSale2Y(); ?></span>

                                    <div class="infobox-content">This Year Sales</div>
                                </div>
                            </div>

                            <div class="infobox infobox-blue">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-users"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo $report->countCustomer(); ?></span>

                                    <div class="infobox-content"><?php echo CHtml::link('Total Customers', Yii::app()->createUrl("client/admin")); ?></div>
                                </div>
                            </div>

                            <div class="infobox infobox-green">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-user icon-animated-vertical"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo $report->count2dNewCust(); ?></span>

                                    <div class="infobox-content"><?php echo CHtml::link('New Customer Today', Yii::app()->createUrl("client/admin")); ?></div>
                                </div>
                            </div>

                            <div class="infobox infobox-orange2">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-square-o"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo $report->countStock('=0'); ?></span>

                                    <div class="infobox-content"><?php echo CHtml::link(Yii::t('app;','Out of Stock'), Yii::app()->createUrl("report/inventory",array('filter'=>'outstock'))); ?></div>
                                </div>
                            </div>

                            <div class="infobox infobox-red">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-minus-square icon-animated-bell""></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo -$report->countStock('<0'); ?></span>

                                    <div class="infobox-content"><?php echo CHtml::link(Yii::t('app;','Negative Stock'), Yii::app()->createUrl("report/inventory")); ?></div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="space-8"></div>

                    <div class="row">
                        <div class="col-xs-12 widget-container-col">
                            <div class="widget-box widget-color-blue2">
                                <div class="widget-header widget-header-flat">
                                    <h5 class="widget-title bigger lighter">
                                        <i class="ace-icon fa fa-bar-chart-o"></i>
                                        <?php echo Yii::t('app','Sale\'s Chart'); ?>
                                    </h5>
                                    <div class="widget-toolbar">
                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>

                                <!--<div class="widget-body">
                                    <div class="widget-main padding-4">
                                        <?php
/*                                        $this->widget(
                                            'yiiwheels.widgets.highcharts.WhHighCharts',
                                            array(
                                                'pluginOptions' => array(
                                                    //'chart'=> array('type'=>'bar'),
                                                    'title'  => array('text' => Yii::t('app','Daily Sale') - date('M Y')),
                                                    'xAxis'  => array(
                                                        'categories' => $date
                                                    ),
                                                    'yAxis'  => array(
                                                        'title' => array('text' => 'Amount in Riel')
                                                    ),
                                                    'series' => array(
                                                        array('name'=> 'Sub Total' , 'data' => $sub_total),
                                                        array('name'=> 'Total' ,'data' => $total),
                                                    )
                                                )
                                            )
                                        );
                                        */?>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>

                    <div class="space-8"></div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 widget-container-col">
                            <div class="widget-box widget-color-blue2">
                                <div class="widget-header">
                                    <h5 class="widget-title bigger lighter">
                                        <i class="ace-icon fa fa-trophy"></i>
                                        <?php echo Yii::t('app','This Year Top 10 Products ') . Yii::t('app','Ranked by AMOUNT'); ?>
                                    </h5>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main no-padding">

                                        <?php $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                                            'id' => 'top-product-grid-qty',
                                            'fixedHeader' => true,
                                            'responsiveTable' => true,
                                            'type' => TbHtml::GRID_TYPE_BORDERED,
                                            'dataProvider' => $report->dashtopProductbyAmount(),
                                            'summaryText' =>'',
                                           /* 'summaryText' => '<p class="text-info" align="left">' . Yii::t('app',
                                                    'This Year Top 10 Products ') . Yii::t('app',
                                                    'Ranked by QUANTITY') . '</p>',*/
                                            'columns' => array(
                                                array(
                                                    'name' => 'rank',
                                                    'header' => Yii::t('app', 'Rank'),
                                                    'value' => '$data["rank"]',
                                                ),
                                                array(
                                                    'name' => 'item_name',
                                                    'header' => Yii::t('app', 'Item Name'),
                                                    'value' => '$data["item_name"]',
                                                ),
                                                array(
                                                    'name' => 'qty',
                                                    'header' => Yii::t('app', 'Quantity'),
                                                    'value' => '$data["qty"]',
                                                    //'footer'=>$report->paymentTotalQty() ,
                                                ),
                                                array(
                                                    'name' => 'amount',
                                                    'header' => Yii::t('app', 'Total Sales'),
                                                    'value' => 'number_format($data["amount"],Common::getDecimalPlace())',
                                                    //'footer'=>Yii::app()->getNumberFormatter()->formatCurrency($report->paymentTotalAmount(),'USD'),
                                                ),
                                            ),
                                        )); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 widget-container-col">
                            <div class="widget-box widget-color-blue2">
                                <div class="widget-header">
                                    <h5 class="widget-title bigger lighter">
                                        <i class="ace-icon fa fa-graduation-cap"></i>
                                        <?php echo Yii::t('app', 'Best Customer '); ?>
                                    </h5>

                                </div>
                                <div class="widget-body">
                                    <div class="widget-main no-padding">

                                        <?php $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                                            'id' => 'top-product-grid-amount',
                                            'fixedHeader' => true,
                                            'responsiveTable' => true,
                                            'type' => TbHtml::GRID_TYPE_BORDERED,
                                            'dataProvider' => $report->dbBestCustomer(),
                                            'summaryText' => '',
                                            /*'summaryText' => '<p class="text-info" align="left">' . Yii::t('app',
                                                    'This Year Top 10 Products ') . Yii::t('app',
                                                    'Ranked by AMOUNT') . '</p>',*/
                                            'columns' => array(
                                                array(
                                                    'name' => 'rank',
                                                    'header' => Yii::t('app', 'Rank'),
                                                    'value' => '$data["rank"]',
                                                ),
                                                array(
                                                    'name' => 'customer_name',
                                                    'header' => Yii::t('app', 'Customer Name'),
                                                    'value' => '$data["customer_name"]',
                                                ),
                                                array(
                                                    'name' => 'amount',
                                                    'header' => Yii::t('app', 'Purchase Amount'),
                                                    'value' => 'number_format($data["amount"],Common::getDecimalPlace())',
                                                    //'footer'=>Yii::app()->getNumberFormatter()->formatCurrency($report->paymentTotalAmount(),'USD'),
                                                ),
                                            ),
                                        )); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!--/row-->
            </div>
    </div>
          
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>

<!--http://stackoverflow.com/questions/5052543/how-to-fire-ajax-request-periodically-->

<!--http://stackoverflow.com/questions/13668484/warn-user-when-new-data-is-inserted-on-database-->

<!--<script>
(function worker() {
    $.ajax({
        url: 'AjaxRefresh',
        success: function(data) {
            $('.summary_header').html(data);
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker, 10000);
        }
    });
})();
</script>-->

