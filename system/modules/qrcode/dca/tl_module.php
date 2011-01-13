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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['qrcode'] = '{title_legend},name,type,headline,qrcode,qrcode_size,qrcode_margin,qrcode_eclevel;{protected_legend:hide},protected;{expert_legend:hide},guests';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['qrcode'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['qrcode'],
	'inputType'               => 'textarea',
	'eval'                    => array('mandatory'=>true, 'decodeEntities'=>true, 'tl_class'=>'clr')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['qrcode_size'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['qrcode_size'],
	'default'                 => '3',
	'inputType'               => 'select',
	'options'                 => array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40'),
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'clr w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['qrcode_margin'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['qrcode_margin'],
	'default'                 => '3',
	'inputType'               => 'select',
	'options'                 => array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40'),
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['qrcode_eclevel'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['qrcode_eclevel'],
	'default'                 => '0',
	'inputType'               => 'select',
	'options'                 => array('L','M','Q','H'),
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
);

?>