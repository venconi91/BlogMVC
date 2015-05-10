<div class="container container-with-margin-top">
    <?php if (sizeof($this->allPosts) == 0) { ?>
        <div class="row container-with-margin-top">
            <div class="col-md-8 col-md-offset-2">
                <div><p>No posts here yet..</p></div>
                <div><a href="/home/index">Create your post</a></div>
            </div>
        </div>
    <?php } ?>
    <?php foreach ($this->allPosts as $post): ?>
        <div class="row">
            <div class="col-md-7">
                <div class="thumbnail">
                    <h3 class="post-title"><?php echo htmlspecialchars($post['title']) ?></h3>

                    <a href="/posts/view/<?php echo $post['id'] ?>">
                        <div class="well well-sm">
                            view all content..
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="row">
        <div class="col-md-7">
            <ul class="pager">
                <li class="previous <?php
                if ($this->from == 0) {
                    echo "hide";
                }
                ?>">
                    <a href="/posts/index/<?php echo $this->from - $this->count ?>/<?php echo $this->count ?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Newer</a>
                </li>
                <li class="next <?php
                if (sizeof($this->allPosts) < $this->count) {
                    echo "hide";
                }
                ?>">
                    <a href="/posts/index/<?php echo $this->from + $this->count ?>/<?php echo $this->count ?>">Older <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                </li>
            </ul>
        </div>
    </div>
</div>