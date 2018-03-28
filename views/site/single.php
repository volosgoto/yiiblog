<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="blog.html"><img src="<?php echo $article->getImage() ?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?php echo Url::toRoute(['site/category', 'id' => $article->category->id])?>"> <?php echo $article->category->title ?></a></h6>

                            <h1 class="entry-title"><a href="<?php echo Url::toRoute(['site/view', 'id' => $article->category->id])?>"><?php echo $article->title ?></a></h1>


                        </header>
                        <div class="entry-content">
                            <p>
                                <?php echo $article->content ?>
                            </p>
                        </div>
                        <div class="decoration">
                            <a href="#" class="btn btn-default">Decoration</a>
                            <a href="#" class="btn btn-default">Decoration</a>
                        </div>

                        <div class="social-share">
							<span
                                class="social-share-title pull-left text-capitalize">By Rubel <?php echo $article->getDate() ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <div class="top-comment"><!--top comment-->
                    <img src="/images/comment.jpg" class="pull-left img-circle" alt="">
                    <h4>Rubel Miah</h4>

                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
                        invidunt ut labore et dolore magna aliquyam erat.</p>
                </div><!--top comment end-->
                <div class="row"><!--blog next previous-->
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="#">
                                <img src="/images/blog-next.jpg" alt="">

                                <div class="overlay">

                                    <div class="promo-text">
                                        <p><i class=" pull-left fa fa-angle-left"></i></p>
                                        <h5>Rubel is doing Cherry theme</h5>
                                    </div>
                                </div>


                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="#">
                                <img src="/images/blog-next.jpg" alt="">

                                <div class="overlay">
                                    <div class="promo-text">
                                        <p><i class=" pull-right fa fa-angle-right"></i></p>
                                        <h5>Rubel is doing Cherry theme</h5>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><!--blog next previous end-->


                <!--related post carousel-->
                <div class="related-post-carousel">
                    <div class="related-heading">
                        <h4>You might also like</h4>
                    </div>
                    <div class="items">
                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-1.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>


                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-2.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>


                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-3.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>


                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-1.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>

                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-2.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>


                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-3.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>
                    </div>
                </div><!--related post carousel-->


<!--                --><?php // debug ($comments); die;?>
                <?php if (!empty($comments)): ?>
                    <?php foreach ($comments as $comment): ?>
                        <!-- bottom comment-->
                        <div class="bottom-comment"><!--bottom comment-->
                            <h4>3 comments</h4>

                            <div class="comment-img">
                                <img class="img-circle" src="<?php echo $comment->user->image ?>" alt="">
                            </div>

                            <div class="comment-text">
                                <a href="#" class="replay btn pull-right"> Replay</a>
                                <h5><?php echo $comment->user->name ?></h5>

                                <p class="comment-date">
                                    <?php echo $comment->getDate() ?>
                                </p>

                                <p class="para">
                                    <?php echo $comment->text; ?>
                                </p>
                            </div>
                        </div>
                        <!-- end bottom comment-->
                    <?php endforeach; ?>
                <?php endif; ?>


                <!--leave comment-->
                <div class="leave-comment">
                    <h4>Leave a reply</h4>

                    <!-- comment form-->
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'action'=>['site/comment', 'id'=>$article->id],
                        'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])
                    ?>

                    <form class="form-horizontal contact-form" role="form" method="post" action="#">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Write Message'])->label(false)?>

                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Post Comment</button>
                   <?php \yii\widgets\ActiveForm::end() ?>
                        <!-- comment form-->

                </div>
                <!--end leave comment-->

            </div>


        <!-- sidebar-->
        <?php echo $this->render('/partials/sidebar', [
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories
        ]) ?>
        <!--end sidebar-->

        </div>
    </div>
</div>
<!-- end main content-->