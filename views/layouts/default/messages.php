<?php if (isset($_SESSION['messages'])): ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="bs-component">

                <?php foreach ($_SESSION['messages'] as $msg) : ?>

                    <div class="alert alert-dismissible alert-<?php echo $msg['type'] ?>">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        <strong>Message: </strong> <?php echo htmlspecialchars($msg['text']) ?>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
endif;
unset($_SESSION['messages']);
?>





