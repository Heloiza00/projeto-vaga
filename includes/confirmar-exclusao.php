<main>
        <section>
            <a href="index.php"><button class="btn btn-success">Voltar</button></a>
        </section>

        <h2 class="mt-3">Excluir vaga</h2>

        <form method="post">

                    <div class="form-group">
                        <p>Vocẽ deseja realmente excluir a vaga <strong><?=$obVaga->titulo?></strong>?</p> 
                    </div>

                    <div class="form-group">
                    
                    <a href="index.php"><button class="btn btn-success">Cancelar</button></a>

                        <button type="submit"  name="excluir" class="btn btn-danger"> Excluir</button>
                    </div>

        </form>
</main>