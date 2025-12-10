<section id="about" class="about section" style="list-style: disc !important;">
        <div class="container">
            <section id="about" class="about section">
                <div class="container">
                    <div class="row position-relative">
                        <div class="col-lg-6">
                            <h2 class="inner-title"><a href="#"><?php echo e($section['title'] ?? $homePageContent->title); ?></a></h2>
                            <p>
                                <?php echo $homePageContent ? $homePageContent->content : ''; ?>

                            </p>
                        </div>
                        <div class="col-lg-1">&nbsp;</div>
                        <div class="col-lg-5 about-img">
                            <img src="<?php echo e(asset('uploads/pages/image/'.$homePageContent->image)); ?>" alt="About Image">
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section><?php /**PATH E:\8122025public_html\public_html\resources\views/frontend/homepage/welcome.blade.php ENDPATH**/ ?>