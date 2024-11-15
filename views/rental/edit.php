<?php
$rentalDataExists = (isset($r) && $r->getId() !== null) ? true : false;
$r = (!$rentalDataExists) ? new Rental() : $r;
?>
<?php include 'views/beginHtml.php'; ?>

<div class="container" style="padding-top: 30px;">
    <form action="index.php" method="post" class="col s12">
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        <input type="hidden" name="area" value="<?php echo $area; ?>">
        <input type="hidden" name="id" value="<?php echo ($r instanceof Rental && $rentalDataExists === true) ? $r->getId() : ''; ?>">

        <div class="row">
            <div class="input-field col s12">
                <?php echo $r->getEmployeePulldown(); ?>
                <label for="employee">Mitarbeiter</label>
            </div>
            <div class="input-field col s12">
                <?php echo $r->getCarPulldown(); ?>
                <label for="car">Kennzeichen</label>
            </div>
            
            <!-- Start Date and Time -->
            <div class="input-field col s12">
                <label for="startDate" class="<?php echo ($rentalDataExists && $r->getStartDate()) ? 'active' : ''; ?>">von</label>
                <input id="startDate" name="startDate" type="datetime-local" value="<?php echo ($rentalDataExists && $r->getStartDate()) ? $r->getStartDate() : ''; ?>" class="validate">
            </div>

            <!-- End Date and Time -->
            <div class="input-field col s12">
                <label for="endDate" class="<?php echo ($rentalDataExists && $r->getEndDate()) ? 'active' : ''; ?>">bis</label>
                <input id="endDate" name="endDate" type="datetime-local" value="<?php echo ($rentalDataExists && $r->getEndDate()) ? $r->getEndDate() : ''; ?>" class="validate">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        M.FormSelect.init(elems);
    });
</script>

<?php include 'views/endHtml.php'; ?>
