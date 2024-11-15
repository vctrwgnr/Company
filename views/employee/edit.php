<?php
// Vorbelegen der radio-buttons
$genderW = ' checked';
$genderM = '';
$genderD = '';

if (isset($e)){
    if ($e->getGender() === 'weiblich') {
        $genderW = ' checked';
    }
    if ($e->getGender() === 'männlich') {
        $genderM = ' checked';
        $genderW = '';
    }
    if ($e->getGender() === 'divers') {
        $genderD = ' checked';
        $genderW = '';
    }
}
?>
<?php include 'views/beginHtml.php'; ?>

<div class="container" style="padding-top: 30px;">
    <form action="index.php" method="post" class="col s12">
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        <input type="hidden" name="area" value="<?php echo $area; ?>">
        <input type="hidden" name="id" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getId() : ''; ?>">

        <div class="row">
            <div class="input-field col s12 m6">
                <input id="firstName" name="firstName" type="text" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getFirstName() : ''; ?>" class="validate">
                <label for="firstName">Vorname</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="lastName" name="lastName" type="text" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getLastName() : ''; ?>" class="validate">
                <label for="lastName">Nachname</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <span>Geschlecht</span>
                <p>
                    <label>
                        <input type="radio" name="gender" value="weiblich" <?php echo $genderW; ?> class="with-gap">
                        <span>weiblich</span>
                    </label>
                    <label>
                        <input type="radio" name="gender" value="männlich" <?php echo $genderM; ?> class="with-gap">
                        <span>männlich</span>
                    </label>
                    <label>
                        <input type="radio" name="gender" value="divers" <?php echo $genderD; ?> class="with-gap">
                        <span>divers</span>
                    </label>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6">
                <input id="salary" name="salary" type="number" step="0.01" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getSalary() : ''; ?>" class="validate">
                <label for="salary">Monatslohn</label>
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
