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
 * Class ModuleQRCode 
 *
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    QRCode
 */
class ModuleQRCode extends Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_qrcode';
	
	public function compile() {
		require_once(TL_ROOT . '/plugins/phpqrcode/qrlib.php');
		
		$this->Template->size = ($this->qrcode_size * 25) + (2 * $this->qrcode_size * $this->qrcode_margin);
		$this->Template->alt = str_replace("\n", " ", $this->qrcode);
		$this->Template->qrcode = QRCodeGenerator::generate($this->replaceInsertTags($this->qrcode), $this->qrcode_ecclevel, $this->qrcode_size, $this->qrcode_margin);	}
}

?>