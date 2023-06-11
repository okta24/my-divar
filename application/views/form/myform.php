Register Form: 


<?php echo "<span style='color:red'>".validation_errors()."</span>";?>
<?php echo form_open('myform'); ?>

<h4>user name: </h4>
<input type="text" name="user_name" />

<h4>email : </h4>
<input type="text" name="email" />

<h4>re email</h4>
<input type="text" name="re_email" />

<h4>password:</h4>
<input type="password" name="password" />

<input type="submit" value="register" />

</form>