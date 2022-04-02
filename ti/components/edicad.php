<section class="item">
    <div class="cadastros">
        <form method="post">
            <label for="listcad">Lista de Cadastro</label>
            <hr>
            <select name="cadastro" id="listcad">
                <option value="">Selecione o Usuário</option>
                <?
                $query = mysqli_query($conn, "SELECT * FROM users");
                while($result = mysqli_fetch_object($query)){
                    echo "<option value='$result->id_users'>$result->login</option>";
                }
                ?>
            </select>
            <input type="submit" value="Selecionar" name="select">
            <hr>
        </form>
    </div>
    <div class="resultado">
        <?
        if(isset($_POST['select'])){
            $id = $_POST['cadastro'];
            $query = mysqli_query($conn, "SELECT * FROM users where id_users='$id'");
            $assoc = mysqli_fetch_assoc($query);
        ?>
        <section class="item">
            <form action="edit.php" method="get">
                <input type="number" name="id_user" value="<?echo $id;?>" hidden>
                <section>
                    <label for="lg">Login</label>
                    <input type="text" name="login" id="lg" value="<?echo $assoc['login'];?>">
                </section>
                <section>
                    <label for="ac">Acesso</label>
                    <select name="acesso" id="ac">
                        <option value="<?echo $assoc['fk_acess'];?>"><?
                        switch ($assoc['fk_acess']){
                            case 1:
                                echo "Administrador";
                                break;
                            case 2:
                                echo "Médico";
                                break;
                            case 3:
                                echo "Assistente";
                                break;
                            case 4:
                                echo "Funcionário";
                                break;
                            case 5:
                                echo "Paciente";
                                break;
                        }
                        ?></option>
                        <?php
                        $id_acess = $assoc['fk_acess'];
                        $select = "SELECT * FROM acesso";
                        $query = mysqli_query($conn, $select);
                        while($result = mysqli_fetch_object($query)){
                            $id_acess_consult = $result->id_acess;
                            foreach(explode(', ',$id_acess_consult) as $item){
                                if($id_acess !== $item){
                                    echo "<option value='".$result->id_acess."'>".$result->nome_acesso."</option>";
                                }
                            }
                            
                        }
                        ?>
                    </select>
                </section>
                <section>
                        <label for="eml">E-mail</label>
                        <input type="email" name="email" id="eml" value="<?echo $assoc['email'];?>">
                </section>
                <section>
                    <label for="ps">Password</label>
                    <input type="password" name="pass" id="ps"><br>
                    <label for="reps">Re-Password</label>
                    <input type="password" name="repass" id="reps">
                </section>
                <hr>
                <section>
                    <input type="submit" name="envie">
                </section>
            </form>
        </section>
        <?
        }else{

        }
        ?>
    </div>
</section>