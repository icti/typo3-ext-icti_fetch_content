<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2015 Jose Antonio Guerra <jaguerra@icti.es>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Plugin 'Fetch external content' for the 'icti_fetch_content' extension.
 *
 * @author	Jose Antonio Guerra <jaguerra@icti.es>
 * @package	TYPO3
 * @subpackage	tx_ictifetchcontent
 */
class tx_ictifetchcontent_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_ictifetchcontent_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_ictifetchcontent_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'icti_fetch_content';	// The extension key.
	var $pi_checkCHash = true;

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

		if (!extension_loaded('curl')) {
				return '';
		}

	  $curl_connection = curl_init();
    $str_url = $this->cObj->data['select_key'];
		if (strlen(trim($str_url)) == 0) {
				return '';
		}

    curl_setopt($curl_connection, CURLOPT_URL, $str_url);
    curl_setopt($curl_connection, CURLOPT_HTTPGET, 1);
    curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 10);
    $str_response = curl_exec($curl_connection);
    curl_close($curl_connection);

    return $str_response;

	}
}

?>