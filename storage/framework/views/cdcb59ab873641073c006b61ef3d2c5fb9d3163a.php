<div class="blog-area blog-details-area padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article class="cropium-blog-item">
                    <div class="blog-image">
                        <img src="<?php echo e(filter_var($post->thumbnail, FILTER_VALIDATE_URL)
                            ? $post->thumbnail
                            : asset('/storage/post-images/') . '/' . $post->thumbnail); ?>"
                            alt="">
                        <div class="blog-date">
                            <h5 class="title"><?php echo e($post->created_at->format('d')); ?></h5>
                            <span><?php echo e($post->created_at->format('M')); ?></span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="<?php echo e(route('users.show', $post->user->slug)); ?>"><i
                                            class="fa fa-user-o"></i><?php echo e($post->user->name); ?></a></li>
                                <li>
                                    <i class="fa fa-bookmark-o"></i>
                                    <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->last): ?>
                                            <a
                                                href="<?php echo e(route('categories.show', $category->slug)); ?>"><?php echo e($category->name); ?></a>
                                        <?php else: ?>
                                            <a
                                                href="<?php echo e(route('categories.show', $category->slug)); ?>"><?php echo e($category->name); ?></a>,
                                            &nbsp;
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </li>
                            </ul>
                        </div>
                        <h3 class="title"><?php echo e($post->title); ?></h3>

                        <p>
                            <?php echo e($post->content); ?>

                        </p>

                        <p>We are able to guarantee a very high level of satisfaction for our clients. Pharetra libero
                            non facilisis imperdiet, quis nostrud exer citation ullamco laboris nisi ut aliquip ex
                            commodo.Enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia conse
                            quuntur.magni do lores eos ratione voluptatem sequinesc neque porro quisquam est qui dolorem
                            ipsum quia dolor sit amet consectetur conse inquat.</p>
                        <p>Pharetra libero non facilisis imperdiet, quis nostrud exer citation ullamco laboris nisi ut
                            aliquip ex commodo.Enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed
                            quia conse quuntur.magni do lores eos ratione voluptatem sequinesc neque porro quisquam est
                            qui dolorem ipsum quia dolor sit amet consectetur conse inquat.</p>
                        <div class="blog-single-quote margin-top-30">
                            <span class="blog-quote"><i class="fa fa-quote-left"></i></span>
                            <p>We are able to guarantee a very high level of satisfaction for our clients. Pharetra
                                libero non facilisis imperdiet, quis nostrud exer</p>
                        </div>
                        <p>Pharetra libero non facilisis imperdiet, quis nostrud exer citation ullamco laboris nisi ut
                            aliquip ex commodo.Enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed
                            quia conse quuntur.magni do lores eos ratione voluptatem sequinesc neque porro quisquam est
                            qui dolorem ipsum quia dolor sit amet consectetur conse inquat.</p>
                    </div>
                </article>

                <div class="area-separator"></div>

                <!-- Blog Comments Starts -->
                <div class="blog-comments-area">
                    <div class="comments-title">
                        <h4 class="title">comments</h4>
                    </div>
                    <ul class="comments-list">
                        <li>
                            <div class="single-comment-list">
                                <div class="list-image">
                                    <img src="<?php echo e(asset('/assets/images/comment-1.jpg')); ?>" alt="author">
                                </div>
                                <div class="list-content">
                                    <h5 class="title">john doe</h5>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo reprehenderit id
                                        molestiae aspernatur dolorem ex.</p>
                                    <span class="replay-button"><i class="fa fa-reply"></i>replay</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="single-comment-list">
                                <div class="list-image">
                                    <img src="<?php echo e(asset('/assets/images/comment-2.jpg')); ?>" alt="author">
                                </div>
                                <div class="list-content">
                                    <h5 class="title">devid warner</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure aut numquam
                                        perspiciatis iste qui laudantium.</p>
                                    <span class="replay-button"><i class="fa fa-reply"></i>replay</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="single-comment-list single-comment-list-02">
                                <div class="list-image">
                                    <img src="<?php echo e(asset('/assets/images/comment-3.jpg')); ?>" alt="author">
                                </div>
                                <div class="list-content">
                                    <h5 class="title">jon snow</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id ratione tempore est
                                        recusandae commodi.</p>
                                    <span class="replay-button"><i class="fa fa-reply"></i>replay</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="area-separator"></div>

                <!-- Blog Comments Form -->
                <div class="comments-form">
                    <div class="comments-title">
                        <h4 class="title">post comment</h4>
                    </div>
                    <div class="blog-comments-form">
                        <form action="#">
                            <input type="text" placeholder="Name">
                            <input type="email" placeholder="Email">
                            <textarea name="message" placeholder="Commente"></textarea>
                            <button type="submit" class="template-btn">submit now</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blog Sidebar Starts -->
            <?php echo $__env->make('components.blog.blog-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        </div>
    </div>
</div>
<?php /**PATH C:\Programs\Laravel\softtechit\cropium-lara9\resources\views/components/areas/blog-details-area.blade.php ENDPATH**/ ?>