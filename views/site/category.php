<!--main content start-->
<?php
    use yii\helpers\Url;
?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">



                <?php foreach ($articles as $article): ?>
                    <article class="post post-list">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="post-thumb">
                                    <a href="<?php echo Url::toRoute(['site/category', 'id' => $article->category->id])?>"><img src="<?php echo $article->getImage() ?>" alt="" class="pull-left"></a>

                                    <a href="<?php echo Url::toRoute(['site/view', 'id' => $article->id])?>" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">View Post</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="post-content">
                                    <header class="entry-header text-uppercase">
                                        <h6><a href="#"> <?php echo $article->description ?></a></h6>

                                        <h1 class="entry-title"><a href="<?php echo Url::toRoute(['site/category', 'id' => $article->category->id])?>"> <?php echo $article->category->title ?></a></h1>
                                    </header>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consadipsinesed diam nonumy eirmod tevidubore et
                                        </p>
                                    </div>
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize">By Rubel <?php echo $article->getDate() ?></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>



                <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>

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

        </div>
    </div>
</div>
<!-- end main content-->