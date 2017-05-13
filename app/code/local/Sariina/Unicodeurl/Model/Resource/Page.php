<?php
/**
 * @name         :  Sariina_Unicodeurl
 * @version      :  0.0.1
 * @since        :  Magento 1.9.3
 * @author       :  Sariina - http://www.sariina.com
 * @license      :  GPL
 * @Creation Date:  2017-05-02
 *
 * */

class Sariina_Unicodeurl_Model_Resource_Page extends Mage_Cms_Model_Resource_Page
{
    /**
     * Process page data before saving
     *
     * @param Mage_Core_Model_Abstract $object
     * @return Mage_Cms_Model_Resource_Page
     */
    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {
        /*
         * For two attributes which represent timestamp data in DB
         * we should make converting such as:
         * If they are empty we need to convert them into DB
         * type NULL so in DB they will be empty and not some default value
         */
        foreach (array('custom_theme_from', 'custom_theme_to') as $field) {
            $value = !$object->getData($field) ? null : $object->getData($field);
            $object->setData($field, $this->formatDate($value));
        }

        /* Unicode URL Start */
        $str = $object->getData('identifier');
        $identifier = preg_replace('#()*!~-=+|\/[^0-9a-z%]+#i', '-', $str);
        $identifier = str_replace(' ', '-', $identifier);
        $identifier = mb_strtolower($identifier,'UTF-8');
        $identifier = trim($identifier, '-');
        $object->setData('identifier', $identifier);
        /* Unicode URL End */

        if (!$this->getIsUniquePageToStores($object)) {
            Mage::throwException(Mage::helper('cms')->__('A page URL key for specified store already exists.'));
        }

        if (!$this->isValidPageIdentifier($object)) {
            Mage::throwException(Mage::helper('cms')->__('The page URL key contains capital letters or disallowed symbols.'));
        }

        if ($this->isNumericPageIdentifier($object)) {
            Mage::throwException(Mage::helper('cms')->__('The page URL key cannot consist only of numbers.'));
        }

        // modify create / update dates
        if ($object->isObjectNew() && !$object->hasCreationTime()) {
            $object->setCreationTime(Mage::getSingleton('core/date')->gmtDate());
        }

        $object->setUpdateTime(Mage::getSingleton('core/date')->gmtDate());

        return parent::_beforeSave($object);
    }

    /**
     *  Check whether page identifier is valid
     *
     *  @param    Mage_Core_Model_Abstract $object
     *  @return   bool
     */
    protected function isValidPageIdentifier(Mage_Core_Model_Abstract $object)
    {
        /* Return true because we have added preg_replace in _beforeSave */
        //return preg_match('/^[a-z0-9][a-z0-9_\/-]+(\.[a-z0-9_-]+)?$/', $object->getData('identifier'));
        return true;
    }
}

