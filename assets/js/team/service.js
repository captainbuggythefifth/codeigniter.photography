var team = team || {};

team.service = {
    _getUserByName: function (data, callback) {
        $.ajax({
            url: '/api/users',
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