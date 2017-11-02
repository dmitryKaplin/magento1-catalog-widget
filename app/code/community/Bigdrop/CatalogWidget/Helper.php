<?php
/**
 * Enable widgets in catalog
 *
 * @category Bigdrop
 * @package  Bigdrop_CatalogWidget
 * @author   Dmitry Kaplin <dmitry.kaplin@bigdropinc.com>
 */
class Bigdrop_CatalogWidget_Helper
{
    /**
     * Translate
     *
     * @return string
     */
    public static function __()
    {
        $args = func_get_args();
        return call_user_func_array(array(self::getData(), '__'), $args);
    }

    /**
     * Check is enabled extension
     *
     * @return bool
     */
    public static function isEnabled()
    {
        return Mage::getStoreConfigFlag('bd_catalog_widget/settings/enabled')
            && Mage::helper('core')->isModuleOutputEnabled('Bigdrop_CatalogWidget');
    }

    /**
     * Check is allowed
     *
     * @return bool
     */
    public static function isAllowed()
    {
        return in_array(self::getFullActionName(), array('adminhtml_catalog_category_wysiwyg', 'adminhtml_catalog_product_wysiwyg'));
    }

    /**
     * Retrieve current store
     *
     * @return Mage_Core_Model_Store
     */
    public static function getStore()
    {
        return Mage::app()->getStore();
    }

    /**
     * Retrieve current store id
     *
     * @return int
     */
    public static function getStoreId()
    {
        return self::getStore()->getId();
    }

    /**
     * Retrieve full action name
     *
     * @return string
     */
    public static function getFullActionName()
    {
        return Mage::app()->getFrontController()->getAction()->getFullActionName('_');
    }
}