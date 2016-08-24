<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/material.min.js"></script>
<script src="/assets/js/ripples.min.js"></script>

<script>
    $(function () {
        $.material.init();

        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if( target.length ) {
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
<script src="/assets/js/team/service.js"></script>
<script src="/assets/js/team/core.js"></script>
<script src="/assets/js/team/ui.js"></script>
</body>
</html>