
<form method="post" action="<?php print(base_url()."/adv/done_edit/".$edit_adv[0]->id); ?>" style="border:1px solid red;width:500px;text-align:center ;">
<table>
<tr>
<td>
name :
</td> 
<td><input type="text" name="name" value="<?php print($edit_adv[0]->name); ?>"><br>
</td>
</tr>

<tr>
<td>
description :
</td> 
<td><textarea name="description"> <?php print($edit_adv[0]->description); ?>  </textarea><br>
</td>
</tr>
<tr>
<td>date:</td><td><input type="text" name="date" value="<?php print($edit_adv[0]->date); ?>"></input><br></td>
</tr>
<tr>
<td>
email:
</td><td><input type="email" name="email" value="<?php print($edit_adv[0]->email); ?>" /><br></td>
</tr>
<tr>
<td>phone:</td> 
<td><input type="number" name="phone" value="<?php print($edit_adv[0]->phone); ?>" /><br></td>

<tr>
<tr>
<td>
<input type="submit" value="edit">
</td>
</tr>
</table>
</form>