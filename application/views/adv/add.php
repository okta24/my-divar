<?php echo form_open_multipart('adv/add');?>

<table class="table">
<tr>
<td>
نام آگهی :
</td> 
<td><input type="text" name="name"><br>
</td>
</tr>

<tr>
<td>
توضیحات آگهی :
</td> 
<td><textarea name="description"></textarea><br>
</td>
</tr>
<tr>
<td>تاریخ:</td><td><input type="text" name="date"></input><br></td>
</tr>
<tr>
<td>
ایمیل آگهی:
</td><td><input type="email" name="email" /><br></td>
</tr>
<tr>
<td>شماره تماس آگهی:</td> 
<td><input type="number" name="phone"/><br></td>
</tr>
<tr>
	<td> تصویر آگهی : </td>
	<td><input type="file" name="advimg" /></td>
</tr>
<tr>
<td>
<input type="submit" value="ارسال " class="btn btn-success">
<a value="لغو " class="btn btn-danger" href="<?php echo base_url(); ?>">لغو</a> 
</td>
</tr>
</table>
</form>