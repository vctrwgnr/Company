<?php include 'views/beginHtml.php'; ?>

<div class="container" style="padding-top: 30px;">
    <table class="highlight responsive-table centered striped">
        <thead>
            <tr>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Geschlecht</th>
                <th>Monatslohn</th>
                <th>Löschen</th>
                <th>Ändern</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($employees as $m ) : ?>
            <tr>
                <td><?php echo $m->getFirstName(); ?></td>
                <td><?php echo $m->getLastName(); ?></td>
                <td><?php echo $m->getGender(); ?></td>
                <td><?php echo number_format($m->getSalary(), 2, ',', ''); ?> €</td>
                <td>
                    <a href="index.php?action=delete&area=employee&id=<?php echo $m->getId(); ?>" 
                       onclick="return confirm('Sind Sie sicher, dass Sie dies löschen möchten?');">
                        <button class="waves-effect waves-light btn-small red darken-1">Löschen</button>
                    </a>
                </td>
                <td>
                    <a href="index.php?action=showEdit&area=employee&id=<?php echo $m->getId(); ?>">
                        <button class="waves-effect waves-light btn-small yellow accent-4">Ändern</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'views/endHtml.php'; ?>
