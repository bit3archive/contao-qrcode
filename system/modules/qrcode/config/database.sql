-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `qrcode` text NULL,
  `qrcode_size` int(2) NOT NULL default '3',
  `qrcode_ecclevel` char(1) NOT NULL default 'L',
  `qrcode_margin` int(2) NOT NULL default '4',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `qrcode` text NULL,
  `qrcode_size` int(2) NOT NULL default '3',
  `qrcode_ecclevel` char(1) NOT NULL default 'L',
  `qrcode_margin` int(2) NOT NULL default '4',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
