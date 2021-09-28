<?php

    include 'AlunosService.php';

    header("Content-Type: application/json; charset=UTF-8");
    // alterando o cabelho para retornar um json

    if($_GET['url']){
        // se houver url ele cria a variável url
        $url = explode('/' , $_GET['url']);
        //var_dump($url);   mostrar a url

        if($url[0] === 'api' ){
            //se estiver tentando acessar a api
            array_shift($url);

            // $service = 'App\\Services\\'.ucfirst( $url[0]).'Service' ;
            // $service = 'App\Services\\'.ucfirst( $url[0]).'Service' ;
            $service = ucfirst( $url[0]).'Service' ;
            array_shift($url);
            // removendo a primeira posição do registro (neste caso api)
            
            $method = strtolower( $_SERVER['REQUEST_METHOD']);
            // metodo get ou post
            var_dump($service) ;
            echo "<br>";
            var_dump($method) ;
            echo "<br>";
            var_dump($url);
            // die();
            try {
              $response =  call_user_func_array(array( new  $service , $method), $url) ;
              // chama o metodo

              http_response_code(200) ; // ok
              echo json_encode( array('staus' => 'sucess' , 'data' => $response));
              //convertendo o resultado em json e mostrando os dados;
            } catch (\Exception $e) {
              http_response_code(404) ; // erro
              echo json_encode( array('status' => 'error' , 'data' => $e->getMessage()));
              //mostrando a mensagem de erro (não encontrado);
            }

        }
    }
