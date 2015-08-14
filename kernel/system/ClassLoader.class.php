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

namespace cm\antonia\kernel\system;

use cm\antonia\kernel\util\StringUtils;

class ClassLoader {
    
    public function loadClass($className){
        $className = str_replace("\\", "_", $className);
        $class = explode('_', $className);
        $DS = DIRECTORY_SEPARATOR;
        if(StringUtils::startsWith($className, "cm_antonia_kernel_system_")){
            include_once realpath(__DIR__.$DS.$class[count($class)-1].'.class.php');
        }else if(StringUtils::startsWith($className, "cm_antonia_kernel_util_")){
            include_once realpath(__DIR__.$DS.'..'.$DS.'util'.$DS.$class[count($class)-1].'.class.php');
        }else if(StringUtils::startsWith($className, "cm_antonia_kernel_database_")){
            include_once realpath(__DIR__.$DS.'..'.$DS.'database'.$DS.$class[count($class)-1].'.class.php');
        }else if(StringUtils::startsWith($className, "cm_antonia_kernel_exception_")){
            include_once realpath(__DIR__.$DS.'..'.$DS.'exception'.$DS.$class[count($class)-1].'.class.php');
        }
    }

}
