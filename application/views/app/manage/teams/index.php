<div class="container">
    <div class="col-sm-12 col-md-10 col-md-offset-2">
        <form class="team-form-add-user" action="/teams" method="post">
            <div class="form-group label-floating">
                <label class="control-label" for="team-add-user">Type in Name or Email of User</label>
                <input class="form-control team-add-user" id="team-add-user" type="text" data-user-id="">
                <input class="team-user-id" id="team-add-user" type="hidden">
            </div>
            <button type="submit" class="btn btn-danger">ADD USER</button>
        </form>
        <table class="table table-hover team-table">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Remove</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($aTeams as $aTeam):?>
                <tr>
                    <th scope="row"><?php echo $aTeam['id']?></th>
                    <td><?php echo $aTeam['aUser']['first_name']?></td>
                    <td><?php echo $aTeam['aUser']['last_name']?></td>
                    <td><?php echo $aTeam['aUser']['email']?></td>
                    <td><a href="#" class="team-remove-user" data-user-id="<?php echo $aTeam['aUser']['id']?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
