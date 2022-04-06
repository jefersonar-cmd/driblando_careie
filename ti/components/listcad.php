<section class="item">
    <table class="list">
        <tr>
            <th>ID</th>
            <td>Login</td>
            <td>Acesso</td>
            <td>Email</td>
            <td>Excluir</td>
        </tr>
        <?php
        $list_query = mysqli_query($conn, "SELECT * FROM users");
        while($res_list = mysqli_fetch_object($list_query)){
            $id = $res_list->id_users;
            echo "<tr>";
            echo "<th>".$res_list->id_users."</th>";
            echo "<td>".$res_list->login."</td>";
            $query = mysqli_query($conn, "SELECT * FROM acesso where id_acess='".$res_list->fk_acess."'");
            $acesso = mysqli_fetch_assoc($query);
            echo "<td>".$acesso['nome_acesso']."</td>";
            echo "<td>".$res_list->email."</td>";
            echo "<td><a href='excluir.php?id=$id'><span class='material-icons'>delete</span></a></td>";
        }
        ?>
    </table>
</section>