<div class="container container-with-margin-top">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-info <?php
            if (sizeof($this->postsWithComments) == 0) {
                echo "hide";
            }
            ?>">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo htmlspecialchars($this->postsWithComments[0]['title']) ?><span class="pull-right small">Shown: <?php echo htmlspecialchars($this->postsWithComments[0]['visits_count']) ?></span></h3>
                </div>
                <div class="panel-body">
                    <div class="bs-component">
                        <div class="well">
                            <?php echo htmlspecialchars($this->postsWithComments[0]['post_content']) ?>
                        </div>
                        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>

                    </div>
                </div>
                <?php foreach ($this->postsWithComments as $comment): ?>
                    <div class="panel-body comment">
                        <div class="list-group-item">
                            <?php if ($this->postsWithComments[0]['comment_content'] == null) { ?>
                                <div>
                                    <p class="no-comments">No comments for this Post</p>
                                </div>
                            <?php } else { ?>
                                <div>
                                    <p class="list-group-item-text"><?php echo htmlspecialchars($comment['comment_content']) ?></p>
                                    <p class="bold"><span class="pull-left small">Name:  <?php echo htmlspecialchars($comment['visitor_name']) ?></span><span class="pull-right small">Email:  <?php echo htmlspecialchars($comment['visitor_email']) ?></span></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-11 col-md-offset-1">
                <div class="row">
                    <!--<div>-->
                    <div class="well bs-component">
                        <form class="form-horizontal" method="POST" action="/comments/create/<?php echo $this->postsWithComments[0]['id'] ?>">
                            <fieldset>
                                <legend>Create new Comment</legend>
                                <div class="form-group">
                                    <label for="commentContent" class="col-lg-2 control-label">Content</label>
                                    <div class="col-lg-10">
                                        <textarea rows="5" name ="content" class="form-control" id="commentContent" placeholder="Content"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="commentAuthor" class="col-lg-2 control-label">Author</label>
                                    <div class="col-lg-10">
                                        <input type="text" name ="visitor_name" class="form-control" id="commentAuthor" placeholder="Author">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="commentEmail" class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" name ="visitor_email" class="form-control" id="commentEmail" placeholder="Email">
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
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</div>