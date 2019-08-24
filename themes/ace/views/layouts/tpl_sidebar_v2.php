<?php
$this->widget('bootstrap.widgets.TbNav', array(
    'type' => TbHtml::NAV_TYPE_LIST,
    'submenuHtmlOptions' => array('class' => 'submenu'),
    'encodeLabel' => false,
    'items' => array(
        array('label' => '<span class="menu-text">' . strtoupper(sysMenuDashboard()) . '</span>',
            'icon' => 'menu-icon '  . sysMenuDashboardIcon(),
            'url' => url('dashboard/view'),
            'active' => $this->id . '/' . $this->action->id == 'dashboard/view' ? true : false,
            'visible' => ckacc('report.dashboard')
        ),
        array('label' => '<span class="menu-text">' . sysMenuReport() . '</span>',
            'icon' => 'menu-icon '  . sysMenuReportIcon(),
            //'url' => url('report/reporttab'),
            'active' => $this->id == 'report' && $this->id . '/' . $this->action->id !== 'report/saleOrderApproval' && $this->id . '/' . $this->action->id !== 'report/saleDelivery',
            'visible' => ckacc('report.sale') || ckacc('report.sale.analytic') || ckacc('report.stock') || ckacc('report.customer') || ckacc('report.marketing') || ckacc('report.accounting') ,
            'items' => array(
                array('label' => Yii::t('app', 'Sale Invoice'),
                    'icon' => 'menu-icon '  . sysMenuReportSaleIcon(),
                    'url' => url('report/SaleInvoice'),
                    'active' => $this->id . '/' . $this->action->id == 'report/SaleInvoice',
                    //'visible' => ckacc('invoice.index') || ckacc('invoice.print') || ckacc('invoice.delete') || ckacc('invoice.update')
                    'visible' => ckacc('report.sale')
                ),
                array('label' => Yii::t('app', 'Sale Daily'),
                    'icon' => 'menu-icon '  . sysMenuReportSaleIcon(),
                    'url' => url('report/SaleDaily'),
                    'active' => $this->id . '/' . $this->action->id == 'report/SaleDaily',
                    'visible' => ckacc('report.sale')
                ),
                array('label' => Yii::t('app', 'Sale Hourly'),
                    'icon' => 'menu-icon '  . sysMenuReportSaleIcon(),
                    'url' => url('report/SaleHourly'),
                    'active' => $this->id . '/' . $this->action->id == 'report/SaleHourly',
                    'visible' => ckacc('report.sale')
                ),
                array('label' => Yii::t('app', 'Sale Summary'),
                    'icon' => 'menu-icon '  . sysMenuReportSaleIcon(),
                    'url' => url('report/SaleSummary'),
                    'active' => $this->id . '/' . $this->action->id == 'report/SaleSummary',
                    'visible' => ckacc('report.sale')
                ),
                array('label' => Yii::t('app', 'Sale By Sale Rep'),
                    'icon' => 'menu-icon '  . sysMenuReportSaleIcon(),
                    'url' => url('report/SaleSumBySaleRep'),
                    'active' => $this->id . '/' . $this->action->id == 'report/SaleSumBySaleRep',
                    'visible' => ckacc('report.sale')
                ),
                array('label' => Yii::t('app', 'Sale Weekly By Customer'),
                    'icon' => 'menu-icon '  . sysMenuReportSaleIcon(),
                    'url' => url('report/SaleWeeklyByCustomer'),
                    'active' => $this->id . '/' . $this->action->id == 'report/SaleWeeklyByCustomer',
                    'visible' => ckacc('report.sale.analytic')
                ),
                array('label' => Yii::t('app', 'Sale Item Summary'),
                    'icon' => 'menu-icon '  . sysMenuReportSaleIcon(),
                    'url' => url('report/SaleItemSummary'),
                    'active' => $this->id . '/' . $this->action->id == 'report/SaleItemSummary',
                    'visible' => ckacc('report.sale')
                ),
                array('label' => Yii::t('app', 'Outstanding Balance'),
                    'icon' => 'menu-icon '  . sysMenuReportSaleIcon(),
                    'url' => url('report/outstandingInvoice'),
                    'active' => $this->id . '/' . $this->action->id == 'report/outstandingInvoice',
                    'visible' => ckacc('report.customer')
                ),
                array('label' => Yii::t('app', 'Profit Daily Sum'),
                    'icon' => 'menu-icon '  . sysMenuReportAccountIcon(),
                    'url' => url('report/ProfitDailySum'),
                    'active' => $this->id . '/' . $this->action->id == 'report/ProfitDailySum',
                    'visible' => ckacc('report.accounting')
                ),
                array('label' => Yii::t('app', 'Payment Receive'),
                    'icon' => 'menu-icon '  . sysMenuReportAccountIcon(),
                    'url' => url('report/PaymentReceiveByEmployee'),
                    'active' => $this->id . '/' . $this->action->id == 'report/PaymentReceiveByEmployee',
                    'visible' => ckacc('report.accounting')
                ),
                array('label' => Yii::t('app', 'Best Selling Item'),
                    'icon' => 'menu-icon '  . 'menu-icon fa fa-trophy',
                    'url' => url('report/TopItem'),
                    'active' => $this->id . '/' . $this->action->id == 'report/TopItem',
                    'visible' => ckacc('report.sale')
                ),
                array('label' => Yii::t('app', 'Item Expiry'),
                    'icon' => 'menu-icon '  .  'menu-icon fa fa-calendar-times-o',
                    'url' => url('report/itemExpiry'),
                    'active' => $this->id . '/' . $this->action->id == 'report/itemExpiry',
                    'visible' => ckacc('report.stock')
                ),
                array('label' => Yii::t('app', 'Inventory'),
                    'icon' => 'menu-icon '  . sysMenuReportStockIcon(),
                    'url' => url('report/Inventory'),
                    'active' => $this->id . '/' . $this->action->id == 'report/Inventory',
                    'visible' => ckacc('report.stock')
                ),
                array('label' => Yii::t('app', 'Transaction'),
                    'icon' => 'menu-icon '  . 'menu-icon fa fa-caret-right',
                    'url' => url('report/Transaction'),
                    'active' => $this->id . '/' . $this->action->id == 'report/Transaction',
                    'visible' => ckacc('report.stock')
                ),
                array('label'=>Yii::t('app','Total Asset'),
                    'icon'=> 'menu-icon fa fa-building',
                    'url'=>url('report/ItemAsset'),
                    'active'=>$this->id .'/'. $this->action->id =='report/ItemAsset',
                    'visible'=> ckacc('report.index'),
                ),
                array('label' => Yii::t('app', 'User Log Summary'), 'icon' => 'menu-icon '  . 'menu-icon fa fa-caret-right', 'url' => url('report/UserLogSummary'),
                    'active' => $this->id . '/' . $this->action->id == 'report/UserLogSummary',
                    'visible' => Yii::app()->user->isAdmin,
                ),
            )),
    ),
));
?>

<!-- #section:basics/sidebar.layout.minimize -->
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
       data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<!-- /section:basics/sidebar.layout.minimize -->
<script type="text/javascript">
    try {
        ace.settings.check('sidebar', 'collapsed')
    } catch (e) {
    }
</script>