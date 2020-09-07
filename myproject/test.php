<form method="post">
    <div class="form-group col-md-3 col-sm-6 col-lg-2 col-xs-12">
    <label class="form-control-label">Transaction Type</label>
    <select class="form-control form-control-sm" name="post_search7">
        <option value="">All</option>
        <option value="Cheque">Cheque</option>
        <option value="Bank Details">Bank Details</option>
    </select>
</div>

<input type="submit" name="submit">
<input type="text" name='text' value="<?php echo $_POST['post_search7'] ?>">
</form>

<?php
if(array_key_exists('submit', $_POST)){
    echo $_POST['post_search7'];
}
?>

<hr>