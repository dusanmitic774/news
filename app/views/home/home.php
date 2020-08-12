<!-- Header start -->
<?php
include VIEWS . 'helpers/header.php'; ?>
<!-- Header end -->

<div class="wrapper w3-mobile">
    <!-- MAIN START -->
    <div class="w3-row">
        <div class="addmargin w3-col m9">
            <?php
            if ($this->exists) : ?>
                <?php
                if ( ! $this->active) : ?>
                    <div class="row">
                        <!-- Featured Big Start -->
                        <div class="w3-col l7">
                            <div class="w3-container">
                                <div class="w3-card w3-margin-bottom">
                                    <a href="<?php
                                    echo BASE_URL . 'route=single&id=' . $this->data['featuredNews']->news_id; ?>">
                                        <img src="<?php
                                        echo IMAGES . $this->data['featuredNews']->image ?>" class="w3-image"
                                             style="width: 100%;">
                                    </a>
                                    <div class="w3-container">
                                        <p><?php
                                            echo $this->data['featuredNews']->category; ?></p>
                                        <p>By: <?php
                                            echo $this->data['featuredNews']->author; ?></p>
                                    </div>
                                    <header class="w3-container">
                                        <h1><?php
                                            echo $this->data['featuredNews']->title; ?></h1>
                                    </header>
                                    <div class="w3-container">
                                        <p><?php
                                            echo substr($this->data['featuredNews']->text, 0, 300); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Featured Big End -->

                        <!-- Featured Small Start -->
                        <div class="w3-col l5">
                            <?php
                            foreach ($this->data['news'] as $news) : ?>
                                <div class="w3-container">
                                    <div class="w3-card w3-margin-bottom">
                                        <a href="<?php
                                        echo BASE_URL . 'route=single&id=' . $news->news_id; ?>">
                                            <img src="<?php
                                            echo IMAGES . $news->image ?>" style="width: 100%;">
                                        </a>
                                        <header class="w3-container">
                                            <h1><?php
                                                echo $news->title; ?></h1>
                                        </header>
                                    </div>
                                </div>
                            <?php
                            endforeach; ?>
                        </div>
                        <!-- Featured Small Start -->
                    </div>
                <?php
                else : ?>
                    <!-- News By Topic -->
                    <?php
                    foreach ($this->data['news'] as $news) : ?>
                        <div class="w3-container">
                            <div class="row">
                                <!-- Image container -->
                                <div class="w3-col l5">
                                    <div class="w3-container">
                                        <div class="w3-card w3-margin-bottom">
                                            <a href="<?php
                                            echo BASE_URL . 'route=single&id=' . $news->news_id; ?>">
                                                <img src="<?php
                                                echo IMAGES . $news->image ?>" class="w3-image" style="width: 100%;">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Text container -->
                                <div class="w3-col l7">
                                    <div class="w3-container">
                                        <div class="w3-card w3-margin-bottom w3-padding">
                                            <div>
                                                <p><?php
                                                    echo $news->category; ?></p>
                                            </div>
                                            <div>
                                                <p>Date: <?php
                                                    echo date('d-M-Y', strtotime($news->date)); ?></p>
                                            </div>
                                            <header class="w3-container">
                                                <h1><?php
                                                    echo $news->title; ?></h1>
                                            </header>
                                            <div>
                                                <p><?php
                                                    echo substr($news->text, 0, 150); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach; ?>
                <?php
                endif; ?>
            <?php
            endif; ?>
        </div>

        <!-- Topics -->
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


<div class="footer">

</div>
</body>

</html>