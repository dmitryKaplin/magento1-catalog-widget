<?php
/**
 * Enable widgets in catalog
 *
 * @category Bigdrop
 * @package  Bigdrop_CatalogWidget
 * @author   Dmitry Kaplin <dmitry.kaplin@bigdropinc.com>
 */
use Bigdrop_CatalogWidget_Helper as Helper;

class Bigdrop_CatalogWidget_Model_Template_Filter extends Mage_Catalog_Model_Template_Filter
{
    /**
     * Parse widget directive
     *
     * @param $construction
     * @return mixed
     */
    public function widgetDirective($construction)
    {
        if (!Helper::isEnabled()) {
            return '';
        }

        $construction[2] .= sprintf(' store_id ="%s"', Helper::getStoreId());
        return Mage::getModel('widget/template_filter')->widgetDirective($construction);
    }
}