<div class="team-users-add-list-container">
    <ul class="team-users-add-list">
        <?php foreach ($aUsers as $aUser):?>
            <li>
                <a href="#" class="team-add-user-to-team-list">
                    <div>
                        <?php echo $aUser['first_name']?>
                    </div>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</div>
