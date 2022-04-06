<?php
if($acesso == 1 or $acesso == 3){
?>
<section class="itens">
    <h1> Dados Cadastrais </h1>
    <hr>
    <h4 class="fcadus">
        <form method="get" class="cadus" action="caddados.php">
                <section>
                        <label for="nome">Nome*</label><br>
                        <input type="text" name="nome" id="nome" placeholder="Digite o Nome e Segundo Nome" required>
                </section>
                <section>
                        <label for="cpf">CPF*</label><br>
                        <input type="number" name="cpf" id="cpf" placeholder="Somente números" required maxlength="11">
                </section>
                <section>
                        <label for="rg">RG*</label><br>
                        <input type="number" name="rg" id="rg" placeholder="Somente números" required maxlength="9">
                </section>
                <section>
                        <label for="tel">Telefone*</label><br>
                        <input type="number" name="tel" id="tel" required  maxlength="11">
                </section>
                <section>
                        <label for="endereco">Endereço*</label><br>
                        <input type="text" name="endereco" id="endereco" required>
                </section>
                <section>
                        <label for="numero">Número*</label><br>
                        <input type="number" name="numero" id="numero" required>
                </section>
                <section>
                        <label for="compl">Complemento</label><br>
                        <input type="text" name="compl" id="compl">
                </section>
                <section>
                        <label for="bairro">Bairro*</label><br>
                        <input type="text" name="bairro" id="bairro" required>
                </section>
                <section>
                        <label for="cidade">Cidade*</label><br>
                        <input type="text" name="cidade" id="cidade" required>
                </section>
                <section>
                        <label for="estado">Estado*</label><br>
                        <select id="estado" name="estado">
                                <option value="">Selecione</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                                <option value="EX">Estrangeiro</option>
                        </select>
                </section>
                <section>
                        <label for="login">Login*</label><br>
                        <input type="text" name="login" id="login" required>
                </section>
                <section>
                        <label for="email">E-mail</label><br>
                        <input type="email" name="email" id="email">
                </section>
                <section>
                        <label for="senha">Senha*</label><br>
                        <input type="password" name="senha" id="senha" required>
                </section>
                <section>
                        <label for="resenha">Repita Senha*</label><br>
                        <input type="password" name="repsenha" id="repsenha" required>
                </section>
                <?php
                if($acesso == 1){
                ?>
                <section>
                        <label for="acesso">Nível de Acesso</label><br>
                        <select name="acesso" id="acesso" required>
                                <option value="">Selecione</option>
                                <option value="2">Médico</option>
                                <option value="3">Assistente</option>
                                <option value="5">Paciente</option>
                        </select>
                </section>
                <?php
                }elseif($acesso == 3){
                ?>
                <section>
                        <label for="acesso">Nível de Acesso</label><br>
                        <select name="acesso" id="acesso" required>
                                <option value="">Selecione</option>
                                <option value="5">Paciente</option>
                        </select>
                </section>
                <?php
                }
                ?>
                <section class="submit">
                        <button type="submit" name="cadastrar">Cadastrar</button>
                        <input type="reset" value="Limpar">
                </section>
        </form>
    </h4>
    <?php
        if(!isset($_SESSION['cad_report'])){

        }else{
                echo $_SESSION['cad_report'];
                unset($_SESSION['cad_report']);
        }
        ?>
</section>
<?php
}
?>
<section class="itens">
        <table>
                <thead>
                        <tr>
                                <th>Nome</th>
                                <td>CPF</td>
                                <td>Telefone</td>
                                <td>Login</td>
                                <td>Email</td>
                                <?php
                                if($acesso == 1 or $acesso == 3){
                                ?>
                                <td>Editar</td>
                                <td>Excluir</td>
                                <?php
                                }
                                ?>
                        </tr>
                </thead>
                <tbody>
                        <?php
                        $cadastros = mysqli_query($conn, "SELECT * FROM dados");
                        while($result = mysqli_fetch_object($cadastros)){
                                $id = $result->id_dados;
                                $users = mysqli_query($conn, "SELECT * FROM users where fk_dados='$id'");
                                $r_users = mysqli_fetch_assoc($users);
                                if($acesso == 3){
                                        if($r_users['fk_acess'] != 2 and $r_users['fk_acess'] != 1 and $r_users['fk_acess'] != 3){
                        ?>
                        <tr>
                                <td><?php echo $result->nome;?></td>
                                <th><?php echo $result->cpf;?></th>
                                <td><?php echo $result->telefone;?></td>
                                <td><?php echo $r_users['login'];?></td>
                                <td><?php echo $r_users['email'];?></td>
                                <td><a href="index.php?p=3&e=<?php echo $id;?>"><span class="material-icons">edit</span></a></td>
                                <td><a href="excluir.php?id=<?php echo $id;?>"><span class="material-icons">delete</span></a></td>
                        </tr>
                        <?php
                                        }
                                }if($acesso == 1){
                                        if($r_users['fk_acess'] != 1){
                        ?>
                        <tr>
                                <td><?php echo $result->nome;?></td>
                                <th><?php echo $result->cpf;?></th>
                                <td><?php echo $result->telefone;?></td>
                                <td><?php echo $r_users['login'];?></td>
                                <td><?php echo $r_users['email'];?></td>
                                <td><a href="index.php?p=3&e=<?php echo $id;?>"><span class="material-icons">edit</span></a></td>
                                <td><a href="deletecad.php?id=<?php echo $id;?>"><span class="material-icons">delete</span></a></td>
                        </tr>
                        <?php
                                        }
                                }
                        }
                        ?>
                </tbody>
        </table>
</section>
<?php
$edit = @$_GET['e'];
if($edit != ""){
        $edit_query = mysqli_query($conn, "SELECT * FROM dados where id_dados='$edit'");
        $r_edit = mysqli_fetch_assoc($edit_query);
        $login_query = mysqli_query($conn, "SELECT * FROM users WHERE fk_dados='$edit'");
        $r_users = mysqli_fetch_assoc($login_query);
        $fk_acess = $r_users['fk_acess'];
        $q_acess = mysqli_query($conn, "SELECT * FROM acesso where id_acess='$fk_acess'");
        $qa_acess = mysqli_query($conn, "SELECT * FROM acesso");
        $ra_acess = mysqli_fetch_assoc($q_acess);
?>
<section class="itens">
        <h1> Editor de Cadastros </h1>
        <hr>
        <h4 class="fcadus">
                <form method="get" class="cadus" action="edidados.php">
                        <input type="number" name="id" hidden value="<?php echo $r_edit['id_dados'];?>" >
                        <section>
                                <label for="nome">Nome*</label><br>
                                <input type="text" name="nome" id="nome" value="<?php echo $r_edit['nome'];?>" required>
                        </section>
                        <section>
                                <label for="cpf">CPF*</label><br>
                                <input type="number" name="cpf" id="cpf"  value="<?php echo $r_edit['cpf'];?>" required maxlength="11">
                        </section>
                        <section>
                                <label for="rg">RG*</label><br>
                                <input type="number" name="rg" id="rg"  value="<?php echo $r_edit['rg'];?>" required maxlength="9">
                        </section>
                        <section>
                                <label for="tel">Telefone*</label><br>
                                <input type="number" name="tel" id="tel"  value="<?php echo $r_edit['telefone'];?>" required  maxlength="11">
                        </section>
                        <section>
                                <label for="endereco">Endereço*</label><br>
                                <input type="text" name="endereco" id="endereco"  value="<?php echo $r_edit['endereco'];?>" required>
                        </section>
                        <section>
                                <label for="numero">Número*</label><br>
                                <input type="number" name="numero" id="numero"  value="<?php echo $r_edit['numero'];?>" required>
                        </section>
                        <section>
                                <label for="compl">Complemento</label><br>
                                <input type="text" name="compl"  value="<?php echo $r_edit['complemento'];?>" id="compl">
                        </section>
                        <section>
                                <label for="bairro">Bairro*</label><br>
                                <input type="text" name="bairro" id="bairro" value="<?php echo $r_edit['bairro'];?>" required>
                        </section>
                        <section>
                                <label for="cidade">Cidade*</label><br>
                                <input type="text" name="cidade" id="cidade" value="<?php echo $r_edit['cidade'];?>" required>
                        </section>
                        <section>
                                <label for="estado">Estado (Sigla)*</label><br>
                                <input type="text" name="estado" id="estado" value="<?php echo $r_edit['estado'];?>" required>
                        </section>
                        <section>
                                <label for="login">Login*</label><br>
                                <input type="text" name="login" id="login" value="<?php echo $r_users['login'];?>" required>
                        </section>
                        <section>
                                <label for="email">E-mail</label><br>
                                <input type="email" name="email" value="<?php echo $r_users['email'];?>" id="email">
                        </section>
                        <section>
                                <label for="senha">Senha*</label><br>
                                <input type="password" name="senha" id="senha">
                        </section>
                        <section>
                                <label for="resenha">Repita Senha*</label><br>
                                <input type="password" name="repsenha" id="repsenha">
                        </section>
                        <?php
                        if($acesso == 1){
                        ?>
                        <section>
                                <label for="acesso">Nível de Acesso</label><br>
                                <select name="acesso" id="acesso" required>
                                        <option value="<?php echo $fk_acess;?>"><?php echo $ra_acess['nome_acesso'];?></option>
                                        <?php
                                        while($r_acesso = mysqli_fetch_object($qa_acess)){
                                                if($r_acesso->id_acess != $fk_acess and $r_acesso->id_acess != 1){
                                        ?>
                                        <option value="<?php echo $r_acesso->id_acess;?>"><?php echo $r_acesso->nome_acesso;?></option>
                                        <?php
                                                }
                                        }
                                        ?>
                                </select>
                        </section>
                        <?php
                        }elseif($acesso == 3){
                        ?>
                        <section>
                                <label for="acesso">Nível de Acesso</label><br>
                                <select name="acesso" id="acesso" required>
                                        <option value="<?php echo $fk_acess;?>"><?php echo $ra_acess['nome_acesso'];?></option>
                                </select>
                        </section>
                        <?php
                        }
                        ?>
                        <section class="submit">
                        <button type="submit" name="editar">Editar</button>
                                <input type="reset" value="Limpar">
                        </section>
                </form>
        </h4>
</section>
<?php
}
?>
