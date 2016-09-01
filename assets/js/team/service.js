var team = team || {};

team.service = {
    _getUsersByName: function (data, callback) {
        $.ajax({
            url: '/users/getUsersByName',
            data : data,
            type: 'GET',
            dataType: "JSON",
            success: function(result){
                callback && callback.success(result);
            }
        }).always(function(data){
            callback && callback.done(data);
        });
    }
}