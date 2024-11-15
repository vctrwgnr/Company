<?php include 'views/beginHtml.php'; ?>

<div class="container" style="padding-top: 30px;">
    <table class="highlight responsive-table centered striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Kennzeichen</th>
                <th>von</th>
                <th>bis</th>
                <th>Löschen</th>
                <th>Ändern</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($rentals as $r) : ?>
            <tr>
                <td><?php echo $r->getEmployee()->getName(); ?></td>
                <td><?php echo $r->getCar()->getNumberPlate(); ?></td>
                <td><?php echo $r->getStartDate(); ?></td>
                <td><?php echo $r->getEndDate(); ?></td>
                <td>
                    <a href="index.php?action=delete&area=rental&id=<?php echo $r->getId(); ?>" 
                       onclick="return confirm('Sind Sie sicher, dass Sie dies löschen möchten?');">
                        <button class="waves-effect waves-light btn-small red darken-1">Löschen</button>
                    </a>
                </td>
                <td>
                    <a href="index.php?action=showEdit&area=rental&id=<?php echo $r->getId(); ?>">
                        <button class="waves-effect waves-light btn-small yellow accent-4">Ändern</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'views/endHtml.php'; ?>
