<?php
/**
 * @name         :  Sariina_Unicodeurl
 * @version      :  0.0.1
 * @since        :  Magento 1.9.3
 * @author       :  Sariina - http://www.sariina.com
 * @license      :  MIT
 * @Creation Date:  2017-05-02
 *
 * */

class Sariina_Unicodeurl_Model_Product_Url extends Mage_Catalog_Model_Product_Url
{
    public function formatUrlKey($str)
    {
        $urlKey = preg_replace('#()*!~-=+|\/[^0-9a-z%]+#i', '-', Mage::helper('catalog/product_url')->format($str));
        $urlKey = str_replace(' ', '-', $urlKey);
        $urlKey = mb_strtolower($urlKey,'UTF-8');
        $urlKey = trim($urlKey, '-');

        return $urlKey;
    }

}
