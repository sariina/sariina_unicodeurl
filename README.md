Sariina UnicodeUrl Extension
=====================
Magento does not support using UTF-8 characters as URL Keys. This extension makes Magento accept non-english characters to be used as URL Key for Products, Categories and CMS pages.

Facts
-----
- version: 0.1.0
- extension key: sariina/unicodeurl
- [extension on github](https://github.com/sariina/sariina_unicodeurl)


Requirements
------------
- PHP >= 5.4.0
- Mage_Core

Compatibility
-------------
- Magento >= 1.9

Installation Instructions
-------------------------
Install the extension via composer with the key shown above or copy all the files into your document root.
To install via composer your 'requier' array should look like this:
	"require": {
		"sariina/unicodeurl": "dev-master",
		"magento-hackathon/magento-composer-installer": "*"
	},

Uninstallation
--------------
Remove all extension files from your Magento installation.

License
---------
The MIT License (MIT). Please see [License File](LICENSE.txt) for more information.

