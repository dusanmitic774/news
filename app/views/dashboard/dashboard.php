<?php
include VIEWS . 'helpers/header.php'; ?>

    <div class="wrapper w3-mobile">
        <div class="w3-container w3-center">
            <a class="w3-btn w3-blue w3-round w3-centered" href="?route=dashboard&list=users">Users</a>
            <a class="w3-btn w3-blue w3-round w3-centered" href="?route=dashboard&list=news">News</a>
        </div>

        <div class="w3-container">
            <h2><?php
                echo $this->data['listTitle']; ?> List</h2>
            <ul class="w3-ul w3-card-4">
                <?php
                if ($this->active) : ?>
                    <?php
                    foreach ($this->data['news'] as $story) : ?>
                        <li class="w3-bar">
                            <a href="?route=dashboard&list=<?php
                            echo $_GET['list'] ?>&id=<?php
                            echo $story->news_id; ?>" class="w3-bar-item w3-btn w3-red w3-round w3-large w3-right">delete</a>
                            <span class="w3-bar-item  style=" width:85px"><?php
                            echo $story->news_id; ?></span>
                            <div class="w3-bar-item">
                                <span class="w3-large"><?php
                                    echo $story->title; ?></span>
                            </div>
                        </li>
                    <?php
                    endforeach; ?>
                <?php
                else : ?>
                    <?php
                    foreach ($this->data['users'] as $user) : ?>
                        <li class="w3-bar">
                            <a href="?route=dashboard&list=<?php
                            echo $_GET['list'] ?>&id=<?php
                            echo $user->user_id; ?>"
                               class="w3-bar-item w3-btn w3-red w3-round w3-large w3-right">delete</a>
                            <span class="w3-bar-item  style=" width:85px"><?php
                            echo $user->user_id; ?></span>
                            <div class="w3-bar-item">
                                <span class="w3-large"><?php
                                    echo $user->username; ?></span>
                            </div>
                        </li>
                    <?php
                    endforeach; ?>
                <?php
                endif; ?>
            </ul>
        </div>
    </div>

<?php
include VIEWS . 'helpers/footer.php'; ?>