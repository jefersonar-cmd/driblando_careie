<section class="item">
    <form action="cad.php" method="get">
        <section>
            <label for="lg">Login</label>
            <input type="text" name="login" id="lg">
        </section>
        <section>
            <label for="sn">Senha</label>
            <input type="password" name="pass" id="sn">
        </section>
        <section>
            <label for="ac">Acesso</label>
            <select name="acesso" id="ac">
                <option value="">Selecione</option>
                <?php
                $select = "SELECT * FROM acesso";
                $query = mysqli_query($conn, $select);
                while($result = mysqli_fetch_object($query)){
                    echo "<option value='".$result->id_acess."'>".$result->nome_acesso."</option>";
                }
                ?>
            </select>
        </section>
        <section>
                <label for="eml">E-mail</label>
                <input type="email" name="email" id="eml">
        </section>
        <hr>
        <section>
            <input type="submit" value="Cadastrar" name="envie">
        </section>
    </form>
</section>