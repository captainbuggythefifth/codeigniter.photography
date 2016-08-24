<div class="container">
    <div class="col-sm-12 col-md-10 col-md-offset-2">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody>
            <!--<tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>-->
            <?php foreach ($aUsers as $aUser):?>
                <tr>
                    <th scope="row"><?php echo $aUser['id']?></th>
                    <td><?php echo $aUser['first_name']?></td>
                    <td><?php echo $aUser['last_name']?></td>
                    <td><?php echo $aUser['email']?></td>
                    <td><?php echo $aUser['status']?></td>
                    <td><a href="/users/<?php echo $aUser['id']?>"><i class="material-icons">mode_edit</i></a></td>
                    <td><?php echo $aUser['status']?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
