# Extension Based Upload

[![GitHub](https://img.shields.io/badge/GitHub-Accudio-0366d6.svg)](https://github.com/Accudio) [![Twitter](https://img.shields.io/badge/Twitter-@accudio-1DA1F2.svg)](https://twitter.com/accudio) [![Website](https://img.shields.io/badge/Website-accudio.com-4B86AF.svg)](https://accudio.com) [![Donate](https://img.shields.io/badge/Donate-Paypal-009cde.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=alistair.shepherd@hotmail.co.uk&item_name=Supporting+open+source+projects+by+Alistair+Shepherd&currency_code=GBP)

Plugin for [Wordpress][wordpressurl] to configure uploaded files to be sorted into a custom directory under /wp-content/uploads/ based upon their file extensions.

## Features

Simple interface accepting a list of pipe seperated file extensions and a corresponding list of custom directories.

## Requirements

A working installation of [Wordpress][wordpressdownurl], the plugin has been tested with Version 4.9.4 but should work on many versions. 

## Installation

1. Download the latest release zip file: ```wget https://github.com/Accudio/extension-based-upload/releases/download/v1.0.0/extension-based-upload-v1.0.0.zip```
2. Extract the zip in the /wp-content/plugins/ directory: ```unzip extension-based-upload-v1.0.0.zip```.
3. Ensure ```plugins/``` includes the folder ```extension-based-upload```.
4. Log in to Wordpress administration page:
	1. Go to 'Plugins';
	2. Enable plugin 'Extension Based Uploads';
5. For options go to 'Settings' > 'Extension Uploads'

## Version History

- v1.0.0 - Initial public release

## License

Copyright &copy; 2018 [Alistair Shepherd][accudiourl]. Licensed under the [GPLv3 License][licenseurl].

[wordpressurl]:https://wordpress.org/
[wordpressdownurl]:https://wordpress.org/download/
[accudiourl]:https://accudio.com
[licenseurl]:https://www.gnu.org/licenses/gpl-3.0.txt