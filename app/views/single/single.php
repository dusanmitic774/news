<?php
include VIEWS . 'helpers/header.php'; ?>

<div class="wrapper w3-mobile">
    <!-- MAIN START -->
    <div class="w3-row">
        <div class="w3-col m9">
            <img src="<?php
            echo IMAGES . $this->data['news'][0]->image ?>" class="w3-round" style="width:100%;">
            <div class="w3-container">
                <div>
                    <h1><?php
                        echo $this->data['news'][0]->title ?></h1>
                </div>
                <div>
                    <h2><?php
                        echo $this->data['news'][0]->author ?></h2>
                </div>
                <div>
                    <p><?php
                        echo $this->data['news'][0]->category ?></p>
                </div>
                <div>
                    <p>Date: <?php
                        echo date('d-M-Y', strtotime($this->data['news'][0]->date)); ?></p>
                </div>
                <div>
                    <p><?php
                        echo $this->data['news'][0]->text ?></p>
                </div>
            </div>

            <!-- COMMENTS START -->
            <h4>Comments</h4>
            <?php
            foreach ($this->data['comments'] as $story) : ?>
                <div class="w3-card-4 w3-round-xlarge w3-margin-bottom">
                    <div class="w3-container">
                        <h4>Author: <?php
                            echo $story->username; ?></h4>
                        <p>Comment: <?php
                            echo $story->text; ?></p>
                        <?php
                        if (\libs\Session::getSession('username') == $story->username || \libs\Session::sessionExists('admin')) : ?>
                            <a href="?route=single&id=<?php
                            echo $_GET['id'] ?>&comment_id=<?php
                            echo $story->comments_id ?>" class="w3-btn w3-red w3-round w3-margin-bottom">delete</a>
                        <?php
                        endif; ?>
                    </div>
                </div>
            <?php
            endforeach; ?>
            <hr>
            <!-- COMMENTS END -->


            <?php
            if (isset($this->data['errors'])) : ?>
                <div id="errors" class="w3-panel w3-red w3-round-xlarge w3-center">
                    <?php
                    foreach ($this->data['errors'] as $error) : ?>
                        <p><?php
                            echo $error ?></p>
                    <?php
                    endforeach; ?>
                </div>
            <?php
            endif; ?>


            <div class="w3-card-4">
                <div class="w3-container w3-teal w3-margin-bottom">
                    <h3>Leave Comment</h3>
                </div>

                <form class="w3-container" action="" method="POST">
                    <textarea name="text" class="w3-input  w3-border w3-margin-bottom"
                              placeholder="Leave comment..."></textarea>
                    <input type="hidden" name="token" value="<?php
                    echo $this->token; ?>">
                    <input name="submit_btn" class="w3-btn w3-blue w3-round w3-margin-bottom" type="submit"
                           value="Comment">
                </form>
            </div>

        </div>
        <div class="w3-col m3">
            <ul class="w3-ul w3-xlarge w3-center">
                <?php
                foreach ($this->data['topics'] as $topic) : ?>
                    <li><a class="topic_links" href="<?php
                        echo BASE_URL . 'topic=' . $topic; ?>"><?php
                            echo ucfirst($topic); ?></a></li>
                <?php
                endforeach; ?>
            </ul>
        </div>
    </div>
    <!-- MAIN END -->
</div>