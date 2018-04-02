<!--main content start-->
<?php
    use yii\widgets\LinkPager;
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
                                        <h6><a href="<?php echo Url::toRoute(['site/category', 'id' => $article->category->id])?>"> <?php echo $article->description ?></a></h6>

                                        <h1 class="entry-title"><a href="<?php echo Url::toRoute(['site/category', 'id' => $article->category->id])?>"> <?php echo $article->category->title ?></a></h1>
                                    </header>
                                    <div class="entry-content">
                                        <p>
                                            <?php echo $article->description ?>
                                        </p>
                                    </div>
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize">By <?php echo $article->author->name; ?> <?php echo $article->getDate() ?></span>

                                    </div>
                                </div>
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

            <!-- sidebar-->
            <?php echo $this->render('/partials/sidebar', [
//                'articles' => $data['articles'],
//                'pagination' => $data['pagination'],
                    'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories
            ]) ?>
            <!-- end sidebar-->


        </div>
    </div>
</div>
<!-- end main content-->