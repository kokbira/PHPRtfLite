<?php
/*
    PHPRtfLite
    Copyright 2007-2008 Denis Slaveckij <info@phprtf.com>
    Copyright 2010 Steffen Zeidler <sigma_z@web.de>

    This file is part of PHPRtfLite.

    PHPRtfLite is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    PHPRtfLite is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with PHPRtfLite.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * defines font table for the rtf document head
 * @version     1.0.0
 * @author      Steffen Zeidler <sigma_z@web.de>
 * @copyright   2010 Steffen Zeidler
 * @package     PHPRtfLite
 */

class PHPRtfLite_DocHeadDefinition_FontTable
{

    /**
     * defined font families for this font table
     * @var array
     */
    protected $_fontFamilies = array('Times new Roman');

    
    /**
     * adds font family to the font table
     *
     * @param string $fontFamily
     */
    public function add($fontFamily)
    {
        if (!empty($fontFamily)) {
            if (!in_array($fontFamily, $this->_fontFamilies)) {
                $this->_fontFamilies[] = $fontFamily;
            }
        }
    }

    /**
     * gets font index from font table
     *
     * @param  string   $fontFamily
     * @return integer
     */
    public function getFontIndex($fontFamily)
    {
        $index = array_search($fontFamily, $this->_fontFamilies);
        return $index !== false ? $index + 1 : false;
    }

    /**
     * gets rtf font table
     * @return string
     */
    public function getContent()
    {
        $content = '{\fonttbl';

        foreach ($this->_fontFamilies as $key => $value) {
            $content .= '{\f' . $key . ' ' . $value . ';}';
        }

        $content .= '}' . "\r\n";

        return $content;
    }

}