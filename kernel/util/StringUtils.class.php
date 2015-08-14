<?php
//    Antonia - Pride to be Cameroonian
//    
//    This file is part of Antonia
//
//    Antonia is a free framework: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    Antonia is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with Antonia.  If not, see <http://www.gnu.org/licenses/>

/**
 * Antonia
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */

namespace cm\antonia\kernel\util;

class StringUtils {
    
    public static function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
    }
    public static function endsWith($haystack, $needle) {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
    }
    
}
