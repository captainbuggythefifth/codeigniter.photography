var team = team || {};

team.core = {
    Binders: {
        _getUsersByName: function(e){
            var $this = $(e.target);
            var data = {
                'sUserName' : $this.val()
            };
            team.service._getUsersByName(data, {
                success: function (response) {
                    if(response.status == true){
                        var $ul = $(response.view);
                        var $thisPosition = $this.offset();
                        $ul.offset({
                            "top"   : $thisPosition.top - 40
                        });
                        $('.team-form-add-user').append($ul);
                        $ul.show();
                    }
                },
                done: function (response) {
                    //console.log(response);
                }
            })
        }
    }
}