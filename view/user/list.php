<a href="?page=add"><input type="button" value="add user"></a>
<div class="row"></div>
<table border="1">

    <tr>
        <td>STT</td>
        <td>name</td>
        <td>email</td>
        <td>address</td>
        <td>Edit</td>
        <td>Delete</td>

    </tr>
    <?php foreach ($users as $key => $user):?>
    <tr>
        <th><?php echo ++$key;?></th>
        <th><?php echo $user->getUsername();?></th>
        <th><?php echo $user->getEmail();?></th>
      <th><?php echo $user->getAddress()?></th>
<th><a href="index.php?page=edit&id=<?php echo $user->getId()?>">
    <input type="button" value="Edit"></a></th>
        <th><a href="index.php?page=delete&id=<?php echo $user->getId()?>">
                <input type="button" value="Delete" onclick="return confirm('ban co muon xoa khong')"></a></th>
    </tr>
    <?php endforeach; ?>
</table>