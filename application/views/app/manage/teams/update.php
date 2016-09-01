<?php
$aSessionFlashItem = $this->session->flashdata('aResult');
$aUserSessionData = $this->session->userdata('aUser')['data'];
?>
<div class="col-sm-12 col-md-4 col-md-offset-4">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Register</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="/users/<?php echo $aUser['id']?>">
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
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php echo (isset($aUser) && $aUser['email'] != "" ? $aUser['email'] : "")?>">
                        </div>
                    </div>

                    <?php if(isset($aUser) && $aUser['id'] != "" && $aUserSessionData['id']) : ?>
                        <div class="form-group">
                            <label for="inputPassword" class="col-md-2 control-label">Password</label>

                            <div class="col-md-9">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="inputFirstName" class="col-md-2 control-label">First Name</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="first_name" value="<?php echo (isset($aUser) && $aUser['first_name'] != "" ? $aUser['first_name'] : "")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputLastName" class="col-md-2 control-label">Last Name</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="last_name" value="<?php echo (isset($aUser) && $aUser['last_name'] != "" ? $aUser['last_name'] : "")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNickName" class="col-md-2 control-label">Nick Name</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" id="inputNickName" placeholder="Nick Name" name="nick_name" value="<?php echo (isset($aUser) && $aUser['nick_name'] != "" ? $aUser['nick_name'] : "")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-md-2 control-label">Title</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" id="inputTitle" placeholder="Title" name="title" value="<?php echo (isset($aUser) && $aUser['title'] != "" ? $aUser['title'] : "")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPortfolio" class="col-md-2 control-label">Portfolio</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" id="inputPortfolio" placeholder="Portfolio" name="portfolio" value="<?php echo (isset($aUser) && $aUser['portfolio'] != "" ? $aUser['portfolio'] : "")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFacebook" class="col-md-2 control-label">Facebook</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" id="inputFacebook" placeholder="Facebook" name="facebook" value="<?php echo (isset($aUser) && $aUser['facebook'] != "" ? $aUser['facebook'] : "")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTwitter" class="col-md-2 control-label">Twitter</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" id="inputTwitter" placeholder="Twitter" name="twitter" value="<?php echo (isset($aUser) && $aUser['twitter'] != "" ? $aUser['twitter'] : "")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputInstagram" class="col-md-2 control-label">Instagram</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" id="inputInstagram" placeholder="Last Name" name="instagram" value="<?php echo (isset($aUser) && $aUser['instagram'] != "" ? $aUser['instagram'] : "")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="pull-right" style="margin-right: 15px;">
                            <button type="submit" class="btn btn-default">UPDATE</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>