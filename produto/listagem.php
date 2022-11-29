<?php
     
     $mensagem = '';
     if(isset($_GET['status'])){
        switch($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
                break;

            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
                break;    
        }
            
     }



     $resultados = '';
     foreach($produto as $produtos){  //cada posicao de vagas vai ocupa ser por vaga
        $resultados .= '<tr>
                        <td>'.$produtos->id.'</td>
                        <td>'.$produtos->name.'</td>
                        <td>'.$produtos->codigo.'</td>
                        <td>'.$produtos->descricao.'</td>
                        <td>'.$produtos->preco.'</td>
                        <td>'.date('d/m/Y - H:i',strtotime($produtos->data)).'</td>
                        <td>
                            <a href="editar.php?id='.$produtos->id.'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="excluir.php?id='.$produtos->id.'"><button type="button" class="btn btn-danger">Excluir</button></a>
                        </td>
                        </tr>';
     }

     $resultados = strlen($resultados) ? $resultados : '<tr>
                                                           <td colspan="6" class="text-center">
                                                               Nenhuma vaga encontrada
                                                           </td>
                                                        </tr>';

?>
<main>

    <?=$mensagem?>

    <section>
        <a href="cadastrar.php"> 
            <button class="btn btn-success">Novo Produto</button>
        </a>
    </section>
    
    
    <section>

        <table class="table bg-light mt-3">
            
           <thead>
                <tr>                    
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Data</th>
                    <th>Ação</th>               
                </tr>
           </thead>
           <tbody>
             <?=$resultados?>
           </tbody>
        </table>

    </section>

</main>
