

<?php echo "<span style='color:red'><h5>".validation_errors()."</h5></span>";?>

<?php echo form_open('test');?>

<h5>Username :</h5>
<input type="text" name="user_name" />

<h5>password :</h5>
<input type="text" name="password" />
<div><input type="submit" value="enter"></div>

</form>