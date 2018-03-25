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


            <?php echo $this->render('/partials/sidebar', [
                'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories
            ]) ?>

        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->