<?php if (isset($userRole) && $userRole === 'admin') {
    echo 
    '
<div class="container" style="padding-top: 50px;">
  <div class="row center-align">

    <!-- Mitarbeiter Dropdown -->
    <div class="input-field col s12 m4">
      <select onchange="window.location.href=this.value">
        <option value="" disabled selected>Mitarbeiter</option>
        <option value="index.php?action=showTable&area=employee">zur Tabelle Mitarbeiter</option>
        <option value="index.php?action=showEdit&area=employee">zur Eingabe Mitarbeiter</option>
      </select>
      <label></label>
    </div>

    <!-- Auto Dropdown -->
    <div class="input-field col s12 m4">
      <select onchange="window.location.href=this.value">
        <option value="" disabled selected>Auto</option>
        <option value="index.php?action=showTable&area=car">zur Tabelle Auto</option>
        <option value="index.php?action=showEdit&area=car">zur Eingabe Auto</option>
      </select>
      <label></label>
    </div>';

    }
?>

    <!-- Ausleihe Dropdown -->
    <div class="input-field col s12 m4">
      <select onchange="window.location.href=this.value">
        <option value="" disabled selected>Ausleihe</option>
        <option value="index.php?action=showTable&area=rental">zur Tabelle Ausleihe</option>
        <option value="index.php?action=showEdit&area=rental">zur Eingabe Ausleihe</option>
      </select>
      <label></label>
    </div>

  </div>
</div>

<!-- Materialize Select Initialization -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
  });
</script>

