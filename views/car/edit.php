<?php include 'views/beginHtml.php'; ?>

<div class="container" style="padding-top: 30px;">
    <form action="index.php" method="post" class="col s12">
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        <input type="hidden" name="area" value="<?php echo $area; ?>">
        <input type="hidden" name="id" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getId() : ''; ?>">

        <div class="row">
            <div class="input-field col s12">
                <input id="numberPlate" name="numberPlate" type="text" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getNumberPlate() : ''; ?>" class="validate">
                <label for="numberPlate">Kennzeichen</label>
            </div>
            <div class="input-field col s12">
                <input id="maker" name="maker" type="text" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getMaker() : ''; ?>" class="validate">
                <label for="maker">Hersteller</label>
            </div>
            <div class="input-field col s12">
                <input id="type" name="type" type="text" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getType() : ''; ?>" class="validate" required>
                <label for="type">Typ</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <button type="reset" class="waves-effect waves-light btn-small pink lighten-1">Zurücksetzen</button>
                <button type="submit" class="waves-effect waves-light btn-small green accent-4">OK</button>
            </div>
        </div>
    </form>
</div>

<?php include 'views/endHtml.php'; ?>
