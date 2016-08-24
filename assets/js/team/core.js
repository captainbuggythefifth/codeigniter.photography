var team = team || {};

var _token = $("input[name='_token']").val();
team.core = {
    Binders: {
        _getUserByName: function(e){
            var $this = $(e.target);
            console.log($this.val());
            var data = {
                "name" : $this.val(),
                "_token" : _token
            };
            team.service._getUserByName(data, {
                success: function (response) {

                },
                done: function (response) {
                    console.log(response);
                }
            })
        }
    }
}