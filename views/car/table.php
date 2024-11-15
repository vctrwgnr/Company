<?php include 'views/beginHtml.php'; ?>

<div class="container" style="padding-top: 30px;">
    <table class="highlight responsive-table centered striped">
        <thead>
            <tr>
                <th>Kennzeichen</th>
                <th>Hersteller</th>
                <th>Typ</th>
                <th>Löschen</th>
                <th>Ändern</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($cars as $c) : ?>
            <tr>
                <td><?php echo $c->getNumberPlate(); ?></td>
                <td><?php echo $c->getMaker(); ?></td>
                <td><?php echo $c->getType(); ?></td>
                <td>
                    <a href="index.php?action=delete&area=car&id=<?php echo $c->getId(); ?>" 
                       onclick="return confirm('Sind Sie sicher, dass Sie dies löschen möchten?');">
                        <button class="waves-effect waves-light btn-small red darken-1">Löschen</button>
                    </a>
                </td>
                <td>
                    <a href="index.php?action=showEdit&area=car&id=<?php echo $c->getId(); ?>">
                        <button class="waves-effect waves-light btn-small yellow accent-4">Ändern</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'views/endHtml.php'; ?>
