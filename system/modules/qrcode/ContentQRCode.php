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
 * Class ContentQRCode
 *
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    QRCode
 */
class ContentQRCode extends ContentElement
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_qrcode';
	
	public function compile() {
		require_once(TL_ROOT . '/plugins/phpqrcode/qrlib.php');
		
		if (in_array($this->floating, array('left', 'right')))
		{
			$this->Template->floatClass = ' float_' . $this->floating;
			$this->Template->float = ' float:' . $this->floating . ';';
		}
		
		$size = deserialize($this->size);
		
		$this->Template->alt = specialchars($this->alt);
		$this->Template->fullsize = $this->fullsize ? true : false;
		$this->Template->margin = $this->generateMargin(deserialize($this->imagemargin), 'margin');
		$this->Template->qrcode = QRCodeGenerator::generate($this->replaceInsertTags($this->qrcode), $this->qrcode_ecclevel, $this->qrcode_size, $this->qrcode_margin);
		
		// Image link
		if (strlen($this->imageUrl) && TL_MODE == 'FE')
		{
			$this->Template->href = $this->imageUrl;
			$this->Template->attributes = $this->fullsize ? LINK_NEW_WINDOW : '';
		}

		// Fullsize view
		elseif ($this->fullsize && TL_MODE == 'FE')
		{
			$this->Template->href = $this->Template->qrcode;
			$this->Template->attributes = ' rel="lightbox"';
		}
		
		if ($size[0] > 0 || $size[1] > 0)
		{
			$this->Template->src    = $this->getImage($this->Template->qrcode, $size[0], $size[1], $size[2]);
			$this->Template->width  = $size[0];
			$this->Template->height = $size[1];
			// Image dimensions
			if (($imgSize = @getimagesize(TL_ROOT .'/'. $this->Template->src)) !== false)
			{
				$this->Template->width  = $imgSize[0];
				$this->Template->height = $imgSize[1];
			}
		}
		else
		{
			$this->Template->src   = $this->Template->qrcode;
			// Image dimensions
			if (($imgSize = @getimagesize(TL_ROOT .'/'. $this->Template->src)) !== false)
			{
				$this->Template->width  = $imgSize[0];
				$this->Template->height = $imgSize[1];
			}
		} 
	}
}

?>