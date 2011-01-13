<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    QRCode
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Class QRCode 
 *
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    QRCode
 */
class QRCodeGenerator
{
	/**
	 * Generate a QR Code and return the filename. 
	 * 
	 * @param string $strContent
	 */
	public static function generate($strContent, $eclevel = QR_ECLEVEL_L, $size = 3, $margin = 4)
	{
		if (is_string($eclevel))
		{
			switch (strtoupper($eclevel))
			{
			case 'H': $eclevel = QR_ECLEVEL_H; break;
			case 'Q': $eclevel = QR_ECLEVEL_Q; break;
			case 'M': $eclevel = QR_ECLEVEL_M; break;
			default:  $eclevel = QR_ECLEVEL_L; break;
			}
		}
		$strFile = 'system/html/qrcode-' . substr(md5($eclevel.'-'.$size.'-'.$margin.'-'.$strContent), 0, 8) . '.png';
		
		if (!file_exists(TL_ROOT . '/' . $strFile))
		{
			QRcode::png($strContent, TL_ROOT . '/' . $strFile, $eclevel, $size, $margin);
		}
		
		return $strFile;
	}
}

?>