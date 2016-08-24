<?php
    $aSessionFlashItem = $this->session->flashdata('aResult');

?>
<div class="col-sm-12 col-md-4 col-md-offset-4">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Log In</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="/login">
                <fieldset>
                    <legend>Legend</legend>
                    <?php if (is_array($aSessionFlashItem)): ?>
                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Warning!</h4>

                            <p><?php echo $aSessionFlashItem['data']['reason']?></p>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="inputEmail" class="col-md-2 control-label">Email</label>

                        <div class="col-md-9">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-2 control-label">Password</label>

                        <div class="col-md-9">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="pull-right" style="margin-right: 15px;">
                            <button type="submit" class="btn btn-default">LOG IN</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>