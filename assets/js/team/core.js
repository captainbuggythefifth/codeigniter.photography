var team = team || {};

team.core = {
    Binders: {
        _getUsersByName: function(e){
            if($('.team-form-add-user').find(".team-users-add-list-container") !== undefined){
                $(".team-users-add-list-container").hide();
            }
            var $this = $(e.target);
            var data = {
                'sUserName' : $this.val()
            };
            team.service._getUsersByName(data, {
                success: function (response) {
                    if(response.status == true) {
                        var $ul = $(response.view);
                        var $thisPosition = $this.offset();
                        $ul.offset({
                            "top": $thisPosition.top - 40
                        });
                        $('.team-form-add-user').append($ul);
                        $ul.show();
                    }
                },
                done: function (response) {
                    //console.log(response);
                }
            })
        },

        _addUser: function(e){
            var $this = $(e.target).find(".team-add-user");
            var iUserID = $this.data("user-id");

            var data = {
                'iUserID' : iUserID
            };
            team.service._addUser(data, {
                success: function(response){
                    if(response.status == true){

                        $this.parents().find(".team-table").find("tbody").append($(response.view));
                    }
                },
                done: function(response){
                    console.log(response);
                    var options =  {
                        content: response.data.message, // text of the snackbar
                        style: "toast", // add a custom class to your snackbar
                        timeout: 1000 // time in milliseconds after the snackbar autohides, 0 is disabled
                    }

                    $.snackbar(options);
                }
            })
        },

        _teamAddUserNameToTextBox: function(e){
            var $this = $(e.target);
            $this.parents().find(".team-add-user").val($this.text().trim());
            $this.parents().find(".team-add-user").data("user-id", $this.data("user-id"));
        }
    }
}