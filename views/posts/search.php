<div class="container" id="container-with-margin-top">
    <?php if (sizeof($this->searchedPostsByTag) == 0) { ?>
        <div class="row">
            <div class="bs-component">
                <div class="col-md-7 without-content">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        <strong><p>No results</p></strong>
                    </div>
                </div>
            </div>
        </div>
<?php } else { ?>
    <h2>Founded Results:</h2>
    <?php foreach ($this->searchedPostsByTag as $post): ?>
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
<?php } ?>
</div>