<main>
    <section>
        <a href="listar.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
        <div class="form-group">
            <label> Codigo do Produto</label>
            <input type="text" class="form-control" name="codigo" value="<?=$obProduto->codigo?>">
        </div>
        
        <div class="form-group">
            <label> Nome do Produto </label>
            <input class="form-control" name="name" rows="5" value="<?=$obProduto->name?>"></input>
        </div>

        <div class="form-group">
            <label> Descrição </label>
            <textarea class="form-control" name="descricao" rows="5"> <?=$obProduto->descricao?></textarea>
        </div>
        
        <div class="form-group">
            <label> Preço </label>
            <input class="form-control" name="preco" rows="5" value="<?=$obProduto->preco?>"></input>
        </div>

        <div class="form-group">
            <label> Data de validade</label>
            <input class="form-control" name="data_validade" rows="5" value="<?=$obProduto->data_validade?>"></input>
        </div>


        <div class="form-group mt-3">
        <a href="listar.php"><button type="submit" class="btn btn-success"> Enviar </button></a>
        </div>

    </form>
</main>