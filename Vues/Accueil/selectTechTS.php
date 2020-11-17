<?php  while($techTS = $resTechTS->fetch_assoc()){ ?>
<input type="hidden" class="hdnID" name="hdnID" value="<?php echo $techTS['ID']; ?>">
<input type="hidden" class="hdnIDPri" name="hdnIDPri" value="<?php echo $i;?>">
<label for="slcPriorite" class="col-4 col-form-label"><?php echo $techTS['NOMCOMPLET']; ?></label>
<select id="slcPriorite" class="slcPriorite col-8 custom-select form-control" name="slcPriorite">
    <?php $test = obtenirReponseTS(); while($range = $test->fetch_assoc()){ ?>
        <option value="<?php echo $range['CODE']; ?>"> <?php echo $range['DESCRIPTION']; ?></option>
    <?php } ?>
</select>
<?php } ?>