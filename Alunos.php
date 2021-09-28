<?php

      // Arquivo de Regras de negócio

      require_once 'config.php' ;
      class Alunos 
      {
        
        public static function select(int $id)
        {
            $tabela = "alunos";
            $coluna = "id";
            
            $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            // conectando com o banco de dados através do PDO
            // pegando as informações do config.php (variáveis globais)

            $sql = "select * from $tabela where $coluna = :id" ;
            // comando que será executado no banco de dados para consultar

            $stmt = $connPdo->prepare($sql);
            // preparando o comando Select para ser executado

            $stmt->bindValue(':id' , $id) ;
            // configurando o parametro de busca

            $stmt->execute() ;
            // executando o comando select no banco de dados

            if ($stmt->rowCount() > 0)
            {
                // se houve retorno de dados
                var_dump( $stmt->fetch(\PDO::FETCH_ASSOC) );

                return $stmt->fetch(\PDO::FETCH_ASSOC) ;
                // retornando os dados do banco de dados
            }else{
                // se não houve retorno de dados
                throw new \Exception("Sem registros dos alunos");
            }

        }

        public static function selectAll()
        {
            $tabela = "alunos";
            
            $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "select * from $tabela"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC) ;
            }else{
                throw new \Exception("Sem registros");
            }

        }
         public static function insert($dados)
         {
            
            $tabela = "alunos";
            
            $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "insert into $tabela (nome,email,telefone) values (:nome, :email, :telefone)"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':nome' , $dados['nome']) ;
            $stmt->bindValue(':email' , $dados['email']) ;
            $stmt->bindValue(':telefone' , $dados['telefone']) ;
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados cadastrados com sucesso!';
            }else{
                throw new \Exception("Erro ao  inserir os dados!!");
            }
         }
      }