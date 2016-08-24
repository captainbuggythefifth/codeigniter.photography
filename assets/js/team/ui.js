var team = team || {};

var $body = $('body');

$('#user_id').on("keyup", function (e) {
    team.core.Binders._getUserByName(e)
});
