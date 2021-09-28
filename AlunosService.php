<?php

    // arquivo de controle
    
    include 'Alunos.php';
    class AlunosService 
    {
          // funcão para consulta de dados
          public function get( $id = null)
          {
              if ($id){
              // se existe id
                return Alunos::select($id) ;
              }else{
                return Alunos::selectAll() ;
              }

          }
          // funcão para inclusão de dados
          public function post()
          {
              $dados = $_POST;
              return Alunos::insert($dados);
          }
          // funcão para alteração de dados
          public function update()
          {
              
          }
          // funcão para exclusão de dados
          public function delete()
          {
              
          }
    }