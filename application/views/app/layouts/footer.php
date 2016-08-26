



<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/material.min.js"></script>
<script src="/assets/js/ripples.min.js"></script>

<script>
    $(function () {
        $.material.init();

        $('a[href^="#"]').on('click', function (event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1500);
            }
        });
    });
</script>

<script>
    $(function () {
        var user = $("input[name='user_id']");
        user.on("keypress", function () {
            var $this = $(this);
            console.log($this.val())
        })
    })
</script>

<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1760728680865683',
            xfbml      : true,
            version    : 'v2.6'
        });
    };
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $('.facebook-login').on('click', function(){
        FB.getLoginStatus(function (response) {
            FB.login(function(response) {
                console.log(response);
                var accessToken = response.authResponse.accessToken;
                var iUserID = response.authResponse.userID;
                var appID = "1760728680865683";
                var pageID = "294062294283138";
                var clientSecret = "db6f36a2906769e3ae954516ef35d45d";
                var appsecretProof = "ALALALALALAH!";
                var url = "https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token" + "&client_id=" + appID + "&client_secret=" + clientSecret + "&fb_exchange_token=" + accessToken + "&appsecret_proof=" + appsecretProof;


                var albumID = "294565130899521";

                $.get(url, function(result){

                    console.log(' ----> ', (result));
                    var sResult = result;
                    var aResult = sResult.split("&");
                    console.log(aResult);
                    var aFBExchangeToken = aResult[0];
                    var aExpires = aResult[1];
                    var aFBExchangeTokenVar = aFBExchangeToken.split("=");
                    var aExpiresVar = aExpires.split("=");

                    var sFBExchangeToken = aFBExchangeTokenVar[1];
                    var sExpires = aExpiresVar[1];

                    console.log("Exchange Token:", sFBExchangeToken);
                    console.log("Expires:", sExpires);

                    console.log("Expires In:", (new Date(parseInt(sExpires))));

                    /*var url = "https://graph.facebook.com/294565130899521/photos?fb_exchange_token=" + sFBExchangeToken;*/

                    var url = "https://graph.facebook.com/v2.7/" + pageID + "/albums?access_token=" + sFBExchangeToken;
                    $.get(url, function(result){
                        var aAlbums = result.data;
                        console.log("ALBUMS", aAlbums);
                        for(var i = 0; i < aAlbums.length; i++){
                            var url = "https://graph.facebook.com/v2.7/" + aAlbums[i].id + "/photos?access_token=" + sFBExchangeToken;
                            FB.api(aAlbums[i].id, {
                                fields : "photos",
                                access_token : sFBExchangeToken
                            }, function(result){
                                console.log("FB API:", result);
                            });

                            $.get(url, function(result){
                                console.log("PHOTOS", result);
                                var aPhotos = result.data;
                                for(var j = 0; j < aPhotos.length; j++){
                                    console.log(aPhotos[j]);
                                    /*var url = "https://graph.facebook.com/v2.7/" + aPhotos[j].id + "/picture?access_token=" + sFBExchangeToken;*/
                                    FB.api(aPhotos[j].id, {fields: 'picture', access_token: sFBExchangeToken}, function(result){
                                        console.log("API: ", result);
                                    });
                                }
                            })
                        }
                    })

                });


                if (response.authResponse) {
                    FB.api('/me', {fields: 'email'}, function(response) {
                        //console.log(JSON.stringify(response));
                        var data = {
                            email: response.email
                        };
                        console.log(response);
                    });
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            }, {
                scope: 'manage_pages'
            });
        });
    });

</script>

<script src="/assets/js/team/service.js"></script>
<script src="/assets/js/team/core.js"></script>
<script src="/assets/js/team/ui.js"></script>
</body>
</html>