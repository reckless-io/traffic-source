<?php
/**
 * Reckless_TrafficSource_Block_Adminhtml_Order_Grid
 *
 * @uses Mage_Adminhtml_Block_Widget_Grid
 * @package
 * @version $id$
 * @link www.reckless.io
 * @author JC <hello@reckless.io>
 */
class Reckless_TrafficSource_Block_Adminhtml_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{
    protected function _prepareColumns()
    {
        $this->addColumnAfter(
            'rkl_utm_campaign',
            array(
                'header'=> Mage::helper('sales')->__('Utm Campaign'),
                'width' => '80px',
                'type'  => 'text',
                'index' => 'rkl_utm_campaign',
            ),
            'grand_total'
        );
        $this->addColumnAfter(
            'rkl_web_source',
            array(
                'header'=> Mage::helper('sales')->__('Traffic Source'),
                'width' => '80px',
                'type'  => 'text',
                'index' => 'rkl_web_source',
            ),
            'grand_total'
        );
        parent::_prepareColumns();


        return $this;
    }
}
