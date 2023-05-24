<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="{{asset('frontend/js/app.js')}}"></script>
<script>
    $(window).scroll(function() {
        var elementTop = $('.counting').offset().top;
        var elementBottom = elementTop + $('.counting').outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        if (elementBottom > viewportTop && elementTop < viewportBottom) {
            $('.counting').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');

                $({ countNum: $this.text() }).animate(
                    {
                        countNum: countTo
                    },
                    {
                        duration: 3000,
                        easing: 'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }
                    }
                );
            });
        }
    });
</script>
