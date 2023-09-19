        <!-- slider area start -->                       

        <section class="slider-area pb-95 p-rel">
            <div class="slider-active s-dot-style dot-style dot-style-1 dot-bottom-left-2">

                <div class="single-slider slider-height d-flex align-items-center theme-bg-2">
                    <div class="container container-2">
                        <div class="row align-items-center">
                            <div class="col-xxl-6  col-xl-7 col-lg-6 col-md-6 pt-60 pb-10 pt-md-0 pb-md-0">
                                <div class="slider-content slider-content-3">
                                    <h2 class="s-title pb-28" data-animation="fadeInUp" data-delay=".5s"><?= $products[0]['title'] ?></h2>
                                    <!-- <p class="s-desc pb-75" data-animation="fadeInUp" data-delay=".7s">The name Barstool reflects the designer´s inspiration drawn from the design of chairs throughout history.</p> -->
                                    <div class="p-btn p-btn-5" data-animation="fadeInUp" data-delay=".9s">
                                        <a href="/shop/catalog">Перейти в каталог</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6  col-xl-5 col-lg-6 col-md-6 pt-60 pb-10 pt-md-0 pb-md-0">
                                <div class="slider-thumb" data-animation="fadeInRight" data-delay="1.2s">
                                <?= '<img src="'. Yii::getAlias('@web') . '/img/' . $products[0]['photo'].'">' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-slider slider-height d-flex align-items-center cream-bg-2">
                    <div class="container container-2">
                        <div class="row align-items-center">
                            <div class="col-xxl-6  col-xl-7 col-lg-6 col-md-6 pt-60 pb-10 pt-md-0 pb-md-0">
                                <div class="slider-content slider-content-3">
                                    <h2 class="s-title pb-28" data-animation="fadeInUp" data-delay=".5s"><?= $products[1]['title'] ?></h2>
                                    <!-- <p class="s-desc pb-75" data-animation="fadeInUp" data-delay=".7s">The penguin is made from solid hand painted beech and was designed by famous silver smith PUIK.</p> -->
                                    <div class="p-btn p-btn-5" data-animation="fadeInUp" data-delay=".9s">
                                        <a href="/shop/catalog">Перейти в каталог</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6  col-xl-5 col-lg-6 col-md-6 pt-60 pb-10 pt-md-0 pb-md-0">
                                <div class="slider-thumb" data-animation="fadeInRight" data-delay="1.2s">
                                <?= '<img src="'. Yii::getAlias('@web') . '/img/' . $products[1]['photo'].'">' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-height d-flex align-items-center gray-bg-6">
                    <div class="container container-2">
                        <div class="row align-items-center">
                            <div class="col-xxl-6  col-xl-7 col-lg-6 col-md-6 pt-60 pb-10 pt-md-0 pb-md-0">
                                <div class="slider-content slider-content-3">
                                    <h2 class="s-title pb-28" data-animation="fadeInUp" data-delay=".5s"><?= $products[2]['title'] ?></h2>
                                    <!-- <p class="s-desc pb-75" data-animation="fadeInUp" data-delay=".7s">The Échasse Vase combines the classic elegance of a traditional glass vase with a playful, light expression.</p> -->
                                    <div class="p-btn p-btn-5" data-animation="fadeInUp" data-delay=".9s">
                                        <a href="/shop/catalog">Перейти в каталог</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6  col-xl-5 col-lg-6 col-md-6 pt-60 pb-10 pt-md-0 pb-md-0">
                                <div class="slider-thumb" data-animation="fadeInRight" data-delay="1.2s">
                                    <?= '<img src="'. Yii::getAlias('@web') . '/img/' . $products[2]['photo'].'">' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="slider-scroll-2 p-abs">
                <a href="#category-area"><i class="fal fa-angle-double-down"></i> <span>Вниз</span></a>
            </div> -->
        </section>
        <!-- slider area end --> 