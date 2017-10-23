<?php
/**
 * Enable widgets in catalog
 *
 * @category Bigdrop
 * @package  Bigdrop_CatalogWidget
 * @author   Dmitry Kaplin <dmitry.kaplin@bigdropinc.com>
 */
use Bigdrop_CatalogWidget_Helper as Helper;

class Bigdrop_CatalogWidget_Model_Observer
{
    /**
     * Extends wysiwyg configuration.
     * Enable magento widgets
     *
     * @param Varien_Event_Observer $observer
     * @return $this
     */
    public function wysiwygConfig(Varien_Event_Observer $observer)
    {
        if (Helper::isEnabled() && Helper::isAllowed()) {
            $observer->getEvent()->getConfig()->setData('add_widgets', true);
        }

        return $this;
    }
}