<tr>
    <th scope="row"><?php echo $aTeam['id']?></th>
    <td><?php echo $aTeam['aUser']['first_name']?></td>
    <td><?php echo $aTeam['aUser']['last_name']?></td>
    <td><?php echo $aTeam['aUser']['email']?></td>
    <td><a href="#" class="team-remove-user" data-user-id="<?php echo $aTeam['aUser']['id']?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
</tr>