<?php
/**
 * Reckless_TrafficSource_Model_Observer
 *
 * @uses Mage_Core_Model_Abstract
 * @package
 * @version $id$
 * @link www.reckless.io
 * @author JC <hello@reckless.io>
 */
class Reckless_TrafficSource_Model_Observer extends Mage_Core_Model_Abstract
{
    /**
     * Predispatch Controller
     * Store referer url in session to save the user's origin when placing an order.
     *
     * @param Varien_Object $observer
     * @return $this
     */
    public function controllerActionPredispatch($observer)
    {
        $referer = parse_url(Mage::app()->getFrontController()->getRequest()->getServer('HTTP_REFERER'), PHP_URL_HOST);
        $current = parse_url(Mage::helper('core/url')->getCurrentUrl(), PHP_URL_HOST);

        if ($referer && $referer != $current) {
            $customerSession = Mage::getSingleton('customer/session');
            $customerSession->setData(
                'rkl_web_source',
                $referer
            );
        }
        return $this;
    }


    /**
     * Observer: salesOrderSaveBefore
     * Save the referer url and the google campaigns data in the order.
     *
     * @param Varien_Object $observer
     * @return $this
     */
    public function salesOrderSaveBefore($observer)
    {

        $order = $observer->getEvent()->getOrder();
        $utmzCookie = Mage::getModel('core/cookie')->get('__utmz');
        $customerSession = Mage::getSingleton('customer/session');

        $order->setData(
            'rkl_web_source',
            $customerSession->getData('rkl_web_source')
        );

        if ($utmzCookie) {
            $utmzParams = array();
            parse_str(
                str_replace(
                    '|',
                    '&',
                    substr(
                        $utmzCookie,
                        strpos($utmzCookie, 'utm')
                    )
                ),
                $utmzParams
            );

            $order->setData(
                'rkl_utm_source',
                isset(
                    $utmzParams['utmcsr']
                ) ? $utmzParams['utmcsr'] : ''
            );

            $order->setData(
                'rkl_utm_medium',
                isset(
                    $utmzParams['utmcmd']
                ) ? $utmzParams['utmcmd'] : ''
            );

            $order->setData(
                'rkl_utm_term',
                isset(
                    $utmzParams['utmctr']
                ) ? $utmzParams['utmctr'] : ''
            );

            $order->setData(
                'rkl_utm_content',
                isset(
                    $utmzParams['utmcct']
                ) ? $utmzParams['utmcct'] : ''
            );

            $order->setData(
                'rkl_utm_campaign',
                isset(
                    $utmzParams['utmccn']
                ) ? $utmzParams['utmccn'] : ''
            );
        }
        return $this;
    }
}
