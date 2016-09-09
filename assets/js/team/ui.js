var team = team || {};

var $body = $('body');

/*
$('#user_id').on("keyup", function (e) {
    team.core.Binders._getUserByName(e)
});
*/

$body.on("change", ".team-add-user", function(e){
    e.preventDefault();
    team.core.Binders._getUsersByName(e);
});

$body.on("click", ".team-add-user-to-team-list", function(e){
    e.preventDefault();
    team.core.Binders._teamAddUserNameToTextBox(e);
});

$body.on("submit", ".team-form-add-user", function(e){
    e.preventDefault();
    team.core.Binders._addUser(e);
});
