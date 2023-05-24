<section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s">
    <div class="container">
        <div class="row my-5">
            @foreach($counters as $counter)
                <div class="col-lg-3 stats">
                    <div class="stBox">
                        <img src="./resources/img/st1.svg" alt="">
                        <div class="countBox">
                            <div class="counting" data-count="20">0</div>
                            <span>il</span>
                        </div>
                        <h5>Təcrübə</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
