var team = team || {};

team.service = {
    _getUsersByName: function (data, callback) {
        $.ajax({
            url: '/users/getUsersByName',
            data : data,
            type: 'GET',
            dataType: "JSON",
            success: function(response){
                callback && callback.success(response);
            }
        }).always(function(response){
            callback && callback.done(response);
        });
    },

    _addUser: function (data, callback) {
        $.ajax({
            url : '/teams',
            data : data,
            type : "POST",
            dataType: "JSON",
            success: function(response){
                callback && callback.success(response);
            }
        }).always(function(response){
            callback && callback.done(response);
        })
    }
}