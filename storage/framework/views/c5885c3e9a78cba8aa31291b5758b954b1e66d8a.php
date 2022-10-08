<?php $__env->startSection('title', 'Blog'); ?>

<?php $__env->startSection('content'); ?>

<!-- Breadcrumb Area Starts -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title">blog page</h2>
                <a href="#">home</a><span> / blog page</span>
            </div>
        </div>
    </div>
</section>

<!-- Blog Area Starts -->
<div class="blog-area padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="cropium-blog-item">
                        <div class="blog-image">
                            <img src="<?php echo e($post->thumbnail); ?>" alt="<?php echo e($post->title); ?>">
                            <div class="blog-date">
                                <h5 class="title"><?php echo e($post->created_at->format('d')); ?></h5>
                                <span><?php echo e($post->created_at->format('M')); ?></span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user-o"></i><?php echo e($post->user->name); ?></a></li>
                                    <li>
                                        <i class="fa fa-bookmark-o"></i>
                                        <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($loop->last): ?>
                                                <a href="<?php echo e(route('blog.show', $category->slug)); ?>"><?php echo e($category->name); ?></a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('blog.show', $category->slug)); ?>"><?php echo e($category->name); ?></a>, &nbsp;
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title"><a href="<?php echo e(route('blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a></h3>
                            <p><?php echo e($post->excerpt); ?></p>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Blog Sidebar Starts -->
            <div class="col-lg-4">
                <aside class="widget-area sidebar">
                    <div class="widget-search widget-style">
                        <div class="widget-title">
                            <h4 class="title">search</h4>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Search" class="input-shape">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="widget-recent-post widget-style">
                        <div class="widget-title">
                            <h4 class="title">recent posts</h4>
                        </div>
                        <div class="single-post">
                            <div class="single-post-image">
                                <img src="assets/images/recent-post-1.jpg" alt="">
                            </div>
                            <div class="single-post-content">
                                <a href="#">about app development</a>
                                <span>14 Oct 2020</span>
                            </div>
                        </div>
                        <div class="single-post">
                            <div class="single-post-image">
                                <img src="assets/images/recent-post-2.jpg" alt="">
                            </div>
                            <div class="single-post-content">
                                <a href="#">learn SQA</a>
                                <span>14 Oct 2020</span>
                            </div>
                        </div>
                        <div class="single-post">
                            <div class="single-post-image">
                                <img src="assets/images/recent-post-3.jpg" alt="">
                            </div>
                            <div class="single-post-content">
                                <a href="#">digital marketing tools</a>
                                <span>14 Oct 2020</span>
                            </div>
                        </div>
                    </div>

                    <div class="widget-social-links widget-style">
                        <div class="widget-title">
                            <h4 class="title">Follow us</h4>
                        </div>
                        <ul>
                            <li><a href="#"><span class="facebook-icon"><i class="fa fa-facebook-square"></i></span></a>
                            </li>
                            <li><a href="#"><span class="twitter-icon"><i class="fa fa-twitter-square"></i></span></a>
                            </li>
                            <li><a href="#"><span class="google-plus-icon"><i
                                            class="fa fa-google-plus-square"></i></span></a></li>
                            <li><a href="#"><span class="instagram-icon"><i class="fa fa-instagram"></i></span></a></li>
                        </ul>
                    </div>

                    <div class="widget-categories widget-style">
                        <div class="widget-title">
                            <h4 class="title">categories</h4>
                        </div>
                        <ul>
                            <li><a href="#">creative<span>(11)</span></a></li>
                            <li><a href="#">minimal<span>(02)</span></a></li>
                            <li><a href="#">portfolio<span>(10)</span></a></li>
                            <li><a href="#">modern<span>(09)</span></a></li>
                            <li><a href="#">agency<span>(03)</span></a></li>
                        </ul>
                    </div>
                    <!-- Widget Form Starts -->
                    <div class="widget-form">
                        <div class="request-quote-form">
                            <h4 class="title">request a free quote</h4>
                            <form action="#">
                                <input type="text" placeholder="Name">
                                <input type="email" placeholder="Email">
                                <input type="text" placeholder="Phone">
                                <textarea name="message" placeholder="Message"></textarea>
                                <button type="submit">submit request</button>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <!-- Blog Pagination Starts -->
        <div class="row order-md-1">
            <div class="col-lg-12">
                <div class="cropium-blog-pagination">
                    <ul>
                        <li><i class="fa fa-angle-left"></i></li>
                        <li class="active"><span>1</span></li>
                        <li><span>2</span></li>
                        <li><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call To Action Area Starts -->
<section class="call-to-action">
    <div class="container">
        <div class="call-to-action-bg">
            <div class="call-to-action-shape">
                <img src="assets/images/award-shape.png" alt="">
            </div>
            <div class="call-to-action-content">
                <div class="call-to-action-title">
                    <h2 class="title">if you have any question feel free to call <span>120-2587863</span></h2>
                    <div class="margin-top-40">
                        <h6 class="title">It is a long established fact that <a href="#">sujonkhan@gmail.com</a> content
                            of a page.</h6>
                    </div>
                </div>
                <div class="call-to-action-btn">
                    <a href="#" class="template-btn action-btn">get in touch</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Programs\Laravel\softtechit\cropium-lara9\resources\views/pages/blog.blade.php ENDPATH**/ ?>