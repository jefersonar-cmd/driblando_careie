<?php
if($acesso == 1 or $acesso == 3){
?>
<section class="itens">
    <h2> Agendamento de consulta</h2>
    <hr>
    <h3><form method="get" action="cadconsul.php">
        <section>
            <p>
                <label>Selecione um Médico</label>
                <select name="select_medico" required>
                    <option value="" disabled selected>Selecione</option>
                    <?php
                    $users = mysqli_query($conn, "SELECT * FROM users where fk_acess='2'");
                    while($result = mysqli_fetch_assoc($users)){
                        $dados = mysqli_query($conn, "SELECT * FROM dados WHERE id_dados='".$result['fk_dados']."'");
                        $assoc_dados = mysqli_fetch_assoc($dados);
                        echo "<option value='".$result['fk_dados']."'>".$assoc_dados['nome']."</option>";
                    }
                    ?>
                </select>
            </p>

            <p>
                <label>Selecione um Paciente</label>
                <select name="select_paciente" required>
                    <option value="" disabled selected>Selecionar</option>
                    <?php
                    $users = mysqli_query($conn, "SELECT * FROM users where fk_acess='5'");
                    while($result = mysqli_fetch_assoc($users)){
                        $dados = mysqli_query($conn, "SELECT * FROM dados WHERE id_dados='".$result['fk_dados']."'");
                        $assoc_dados = mysqli_fetch_assoc($dados);
                        echo "<option value='".$result['fk_dados']."'>".$assoc_dados['nome']."</option>";
                    }
                    ?>
                </select>
            </p>                    
                <h5>Data e Hora</h5>
                <input type="date" name="data" required>
                <input type="time" name="hora" required>
            <p>
                <label for="obs">Observação</label><br>
                <textarea name="obs" id="obs" cols="30" rows="10"></textarea>
            </p>
            <p>    
                <button type="submit" name="agendar">Agendar</button>
                <button type="reset" name=reset>Limpar</button>
            </p>
        </section>
    </form></h3>
</section>
<?php
}
?>
<section class="itens">
    <table>
        <thead>
            <tr>
                <th>Médico</th>
                <td>Paciente</td>
                <td>Data - Hora</td>
                <td>Visualizar</td>
                <?php
                if($acesso == 1 or $acesso == 3){
                ?>
                <td hidden>Editar</td>
                <td>Excluir</td>
                <?php
                }
                ?>
            </tr>
        </thead>
        <?php
        $consultas = mysqli_query($conn, "SELECT * FROM consultas");
        while($r_cs = mysqli_fetch_assoc($consultas)){
            $medico = $r_cs['fk_medico'];
            $paciente = $r_cs['fk_paciente'];
            $me_paci = mysqli_query($conn, "SELECT * FROM dados WHERE id_dados='$paciente'");
            $me_medi = mysqli_query($conn, "SELECT * FROM dados WHERE id_dados='$medico'");
            $r_medi = mysqli_fetch_assoc($me_medi);
            $r_paci = mysqli_fetch_assoc($me_paci);
        ?>
        <tr>
            <td><?php echo $r_medi['nome'];?></td>
            <td><?php echo $r_paci['nome'];?></td>
            <td><?php echo $r_cs['data_consu']." - ".$r_cs['hora'];?></td>
            <td><a href="index.php?p=2&v=<?php echo $r_cs['id_consu'];?>"><span class="material-icons">search</span></a></td>
            <?php
            if($acesso == 1 or $acesso == 3){
            ?>
                <td hidden><a href="index.php?p=2&e=<?php echo $r_cs['id_consu'];?>"><span class="material-icons">edit</span></a></td>
                <td><a href="delconsu.php?id=<?php echo $r_cs['id_consu'];?>"><span class="material-icons">delete</span></a></td>
            <?php
            }
            ?>
        </tr>
        <?php
        }
        ?>
        <tbody>
        </tbody>
    </table>
</section>
<?php
$v = @$_GET['v'];
$e = @$_GET['e'];
if(!empty($v)){
    $select = mysqli_query($conn, "SELECT * FROM consultas WHERE id_consu='$v'");
    $v_consu = mysqli_fetch_assoc($select);
    $v_m = mysqli_query($conn, "SELECT * FROM dados where id_dados='".$v_consu['fk_medico']."'");
    $v_p = mysqli_query($conn, "SELECT * FROM dados where id_dados='".$v_consu['fk_paciente']."'");
    $v_mr = mysqli_fetch_assoc($v_m);
    $v_pr = mysqli_fetch_assoc($v_p);

?>
<section class="itens">
    <h2>Detalhes da consulta</h2>
    <hr>
    <h3><form method="get" action="cadconsul.php">
        <section>
            <p>
                <label>Doutor:&nbsp;</label>
                <input type="text" value="<?php echo $v_mr['nome'];?>" disabled>
            </p>

            <p>
                <label>Paciente:&nbsp;</label>
                <input type="text" value="<?php echo $v_pr['nome'];?>" disabled>
            </p>                    
                <h5>Data e Hora</h5>
                <input type="input" disabled value="<?php echo $v_consu['data_consu'];?>">
                <input type="input" disabled value="<?php echo $v_consu['hora'];?>">
            <p>
                <label for="obs">Observação</label><br>
                <textarea name="obs" disabled cols="30" rows="10"><?php echo $v_consu['obs'];?></textarea>
            </p>
        </section>
    </form></h3>
</section>
<?php
}
?>