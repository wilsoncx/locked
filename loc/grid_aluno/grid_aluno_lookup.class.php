<?php
class grid_aluno_lookup
{
//  
   function lookup_sexo(&$sexo) 
   {
      $conteudo = "" ; 
      if ($sexo == "M")
      { 
          $conteudo = "Masculino";
      } 
      if ($sexo == "F")
      { 
          $conteudo = "Feminino";
      } 
      if (!empty($conteudo)) 
      { 
          $sexo = $conteudo; 
      } 
   }  
}
?>
