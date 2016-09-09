<div class="team-users-add-list-container">
    <ul class="team-users-add-list">
        <?php foreach ($aUsers as $aUser):?>
            <li>
                <a href="#" class="team-add-user-to-team-list" data-user-id="<?php echo $aUser['id']?>">
                    <?php echo $aUser['first_name'] . " " . $aUser['last_name']?>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</div>
