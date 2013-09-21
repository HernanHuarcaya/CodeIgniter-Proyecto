<table class="table tablaAjustada">
    <thead>
        <tr>
            <th>Id Cliente</th>
            <th>Nombre Completo</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Empresa</th>
            <th>RUC</th>
            <th colspan="2">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($clientes != null) {
            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>" . $cliente->idcliente . "</td>";
                echo "<td>" . $cliente->nom_completo . "</td>";
                echo "<td>" . $cliente->telefono . "</td>";
                echo "<td>" . $cliente->email . "</td>";
                echo "<td>" . $cliente->nom_empresa . "</td>";
                echo "<td>" . $cliente->ruc_empresa . "</td>";
                echo "<td style='text-align: right;'><a href=''>
                    <img width='15px' height='15px' src='" . $this->config->base_url() . "images/edit.png'></a>
                    </td>";
                echo "<td style='text-align: right;'><a href=''>
                    <img width='15px' height='15px' src='" . $this->config->base_url() . "images/delete.png'></a>
                    </td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>