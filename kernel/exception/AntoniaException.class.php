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

namespace cm\antonia\kernel\exception;

class AntoniaException {
    
    public function errorHandler($type, $message, $fichier, $ligne)
    {
        switch ($type)
        {
                case E_ERROR:
                case E_PARSE:
                case E_CORE_ERROR:
                case E_CORE_WARNING:
                case E_COMPILE_ERROR:
                case E_COMPILE_WARNING:
                case E_USER_ERROR:
                        $type_erreur = "Fatal Error";
                        break;

                case E_WARNING:
                case E_USER_WARNING:
                        $type_erreur = "Warning";
                        break;

                case E_NOTICE:
                case E_USER_NOTICE:
                        $type_erreur = "Notice";
                        break;

                case E_STRICT:
                        $type_erreur = "Depreciated Syntax";
                        break;

                default:
                        $type_erreur = "Unknow Error";
        }

        $erreur = date("d.m.Y H:i:s") . ' - <b>' . $type_erreur.'</b> : <b>' . $message . '</b> ligne ' . $ligne . ' (' . $fichier . ')';

        // Affichage de l'erreur

        echo $erreur;

        // Enregistrement de l'erreur dans un fichier txt

        /*
        $log = fopen('Erreurs.txt', 'a');
        fwrite($log, $erreur . "\n");
        fclose($log);
        */

        // Envoi par mail

        // ...

    }

    public function exceptionHandler($exception)  
    {
        $this->errorHandler(E_USER_ERROR, $exception->getMessage(), $exception->getFile(), $exception->getLine());  
    }

    public function fatalErrorHandler()
    {
        if (is_array($e = error_get_last()))
        {
            $type = isset($e['type']) ? $e['type'] : 0;
            $message = isset($e['message']) ? $e['message'] : '';
            $fichier = isset($e['file']) ? $e['file'] : '';
            $ligne = isset($e['line']) ? $e['line'] : '';
            if ($type > 0) {
                $this->errorHandler($type, $message, $fichier, $ligne);
            }
        }
    }

}
