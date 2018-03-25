<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

?>

<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php foreach ($articles as $article): ?>
                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id])?>"><img src="<?php echo $article->getImage() ?>" alt=""></a>

                            <a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id])?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">View Post</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="<?php echo Url::toRoute(['site/category', 'id' => $article->category->id])?>"> <?php echo $article->category->title ?></a></h6>

                                <h1 class="entry-title"><a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id])?>"> <?php echo $article->title; ?> </a></h1>


                            </header>
                            <div class="entry-content">
                                <p>
                                    <?php echo $article->content ?>
                                </p>

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="" class="more-link">Continue Reading</a>
                                </div>
                            </div>
                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">By <a
                                            href="#">Rubel</a> <?php echo $article->getDate() ?></span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class=""></i>Просмотров: </a>
                                    </li> <?php echo (int)$article->viewed ?>
                                </ul>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>



                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
<!--right panel-->
            <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">

                    <aside class="widget">
                        <h3 class="widget-title text-uppercase text-center">Популярные</Gjgjekzhysq></h3>

                        <?php foreach ($popular as $article): ?>
                            <div class="popular-post">


                                <a href="#" class="popular-img"><img src="<?php echo $article->getImage() ?>" alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase"><?php echo $article->title ?></a>
                                    <span class="p-date"><?php echo $article->getDate() ?></span>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </aside>


                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Последние</h3>

                        <?php foreach ($recent as $article): ?>
                            <div class="thumb-latest-posts">


                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img src="<?php echo $article->getImage() ?>"
                                                                             alt="">
                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase"><?php echo $article->title ?></a>
                                        <span class="p-date"><?php echo $article->getDate() ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </aside>

                    <aside class="widget border pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Категории</h3>
                        <ul>
                            <?php foreach ($categories as $category): ?>
                                <li>
                                    <a href="#"><?php echo $category->title ?></a>
                                    <span class="post-count pull-right"> (<?php echo $category->getArticlesCount() ?>
                                        )</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                </div>
            </div>
<!--            end of right panrel-->
        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->