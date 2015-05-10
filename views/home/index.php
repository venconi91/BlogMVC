<div class="container container-with-margin-top">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div>
                    <div class="well bs-component">
                        <form class="form-horizontal" method="POST" action="/posts/create">
                            <fieldset>
                                <legend>Create <?php
                                    if (sizeof($this->posts) == 0) {
                                        echo "your first";
                                    } else {
                                        echo "new";
                                    }
                                    ?> Post</legend>
                                <div class="form-group">
                                    <label for="postTitle" class="col-lg-2 control-label">Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" name ="title"class="form-control" id="postTitle" placeholder="Title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="postContent" class="col-lg-2 control-label">Content</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="content" rows="8" id="postContent" placeholder="Content"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tags" class="col-lg-2 control-label">Tags</label>
                                    <div class="col-lg-10">
                                        <input type="text" name ="tags"class="form-control" id="tags" placeholder="Tags">
                                        <input type = "hidden" name = "token" value = "<?php echo $this->token; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (sizeof($this->posts) > 0) { ?>
            <div class="col-lg-4 col-lg-offset-2">
                <div class="row">
                    <div class="bs-component">
                        <div class="list-group">
                            <p class="list-group-item active">
                                Recent Posts
                            </p>
                            <?php foreach ($this->posts as $post): ?>
                                <a href="/posts/view/<?php echo $post['id'] ?>" class="list-group-item"><?php echo htmlspecialchars($post['title']) ?></a>
                                <?php endforeach; ?>

                            <a href="/posts/index" class="list-group-item bold" >view all posts..</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="bs-component">
                        <div class="list-group">
                            <p class="list-group-item active">
                                Tags
                            </p>
                            <?php foreach ($this->tags as $tag): ?>
                                <a href="/posts/viewByTag/<?php echo $tag['tag'] ?>" class="list-group-item"><?php echo htmlspecialchars($tag['tag']) ?></a>
                                <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?> 
    </div>
</div>
