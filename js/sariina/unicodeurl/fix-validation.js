/**
 * @name         :  Sariina_Unicodeurl
 * @version      :  0.0.1
 * @since        :  Magento 1.9.3
 * @author       :  Sariina - http://www.sariina.com
 * @license      :  GPL
 * @Creation Date:  2017-05-02
 *
 * */

Validation.addAllThese([
    ['validate-identifier', 'Please enter a valid URL Key. For example "example-page", "example-page.html" or "anotherlevel/example-page".', function (v) {
        return true;
    }]
]);

