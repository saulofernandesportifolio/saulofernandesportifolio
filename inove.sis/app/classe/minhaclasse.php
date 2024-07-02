<?php

namespace App\classe;


class minhaClasse{

     public static function criarCodigo(){

         //criar um codigo aleatório (senha) com 10 caracteres
         $valor='';
         $caractere='abcdefghijklmnopqrstuvwyz_ABCDEFGHIJKLMNOPQRSTUVWYZ1234567890!?$#@%';

         for($m=0;$m < 10;$m++){
             $index = rand(0,strlen($caractere));
             $valor.= substr($caractere,$index,1);
         }
       return $valor;
     }
}
