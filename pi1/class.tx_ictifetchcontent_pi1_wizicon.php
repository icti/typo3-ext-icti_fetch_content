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
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */




/**
 * Class that adds the wizard icon.
 *
 * @author	Jose Antonio Guerra <jaguerra@icti.es>
 * @package	TYPO3
 * @subpackage	tx_ictifetchcontent
 */
class tx_ictifetchcontent_pi1_wizicon {


					protected $locallangPath = 'LLL:EXT:icti_fetch_content/locallang.xml:';

					/**
					 * Processing the wizard items array
					 *
					 * @param	array		$wizardItems: The wizard items
					 * @return	Modified array with wizard items
					 */
					function proc($wizardItems)	{

						$wizardItems['plugins_tx_ictifetchcontent_pi1'] = array(
							'icon'=>t3lib_extMgm::extRelPath('icti_fetch_content').'pi1/ce_wiz.gif',
							'title' => $GLOBALS['LANG']->sL($this->locallangPath . 'pi1_title', TRUE),
							'description' => $GLOBALS['LANG']->sL($this->locallangPath . 'pi1_plus_wiz_description', TRUE),
							'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=icti_fetch_content_pi1'
						);

						return $wizardItems;
					}
				}

?>