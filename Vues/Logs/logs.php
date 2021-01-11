<h1>Logs</h1>
<div class="row">
    <div id="tableLogs" class="col">
    <table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th style="width:200px" scope="col">Date de l'action</th>
            <th style="width:200px" scope="col">Utilisateur</th>
            <th style="width:200px" scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $logs = obtenirLogs(); ?>
    <?php while($log = $logs->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $log['DATE']; ?></td>
            <td><?php echo $log['NOMCOMPLET']; ?></td>
            <td><?php echo $log['DESCRIPTION']; ?></td>
        </tr>
    <?php }?>
    </tbody>
</table>
    </div>
</div>