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

    //$customerObj->getTest();

    $n_30_days_customer = $customerObj->get30DaysCustomers();
    $n_60_days_customer = $customerObj->get60DaysCustomers();
    $n_61_days_customer = $customerObj->get61DaysCustomers();
    $n_91_days_customer = $customerObj->get91DaysCustomers();
    
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

                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                    <div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													Client Revision
												</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder"></div>

													<div class="hr hr8 hr-double"></div>

													<div class="clearfix">
														<div class="grid4">
                                                            <a href="<?php echo Yii::app()->createUrl('dashboard/clientRevision', array('filter'=>1)); ?>"><span style="float: left; width:40px; height: 30px; background-color: #68BC31"></span></a>
															<h4 class="bigger pull-right"><?php echo $n_30_days_customer; ?></h4>
														</div>

														<div class="grid4">
                                                        <a href="<?php echo Yii::app()->createUrl('dashboard/clientRevision', array('filter'=>2)); ?>"><span style="float: left; width:40px; height: 30px; background-color: #2091CF"></span></a>
															<h4 class="bigger pull-right"><?php echo $n_60_days_customer; ?></h4>
														</div>

														<div class="grid4">
                                                        <a href="<?php echo Yii::app()->createUrl('dashboard/clientRevision', array('filter'=>3)); ?>"><span style="float: left; width:40px; height: 30px; background-color: #AF4E96"></span></a>
															<h4 class="bigger pull-right"><?php echo $n_61_days_customer; ?></h4>
														</div>
                                                        <div class="grid4">
                                                        <a href="<?php echo Yii::app()->createUrl('dashboard/clientRevision', array('filter'=>4)); ?>"><span style="float: left; width:40px; height: 30px; background-color: #DA5430"></span></a>
															<h4 class="bigger pull-right"><?php echo $n_91_days_customer; ?></h4>
														</div>
													</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
                                    

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

<script>
/*
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
*/

jQuery(function($) {

    //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "<?php echo ClientUpdate::BUY_LAST_30_DAYS ?>",  data: <?php echo $n_30_days_customer; ?>, color: "#68BC31"},
				{ label: "<?php echo ClientUpdate::BUY_30_60_DAYS ?>",  data: <?php echo $n_60_days_customer; ?>, color: "#2091CF"},
				{ label: "<?php echo ClientUpdate::BUY_60_DAY ?>",  data: <?php echo $n_61_days_customer; ?>, color: "#AF4E96"},
				{ label: "<?php echo ClientUpdate::NEVER_BUY ?>",  data: <?php echo $n_91_days_customer; ?>, color: "#DA5430"},
				//{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });

});
</script>

