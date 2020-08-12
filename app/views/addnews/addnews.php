<?php
include VIEWS . 'helpers/header.php'; ?>

    <!-- POST NEWS START -->
    <div class="input-wrapper w3-mobile">

        <?php
        if (isset($this->data['errors'])) : ?>
            <div class="w3-panel w3-red w3-round-xlarge w3-center">
                <?php
                foreach ($this->data['errors'] as $error) : ?>
                    <p><?php
                        echo $error ?></p>
                <?php
                endforeach; ?>
            </div>
        <?php
        endif; ?>

        <form id="inputForm" class="w3-container w3-white w3-round-xlarge" action="" method="POST"
              enctype="multipart/form-data">

            <label class="w3-text-blue"><b>Author</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="author" value="<?php
            echo $this->data['author'] ?>">

            <label class="w3-text-blue"><b>Title</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="title" value="<?php
            echo $this->data['title'] ?>">

            <label class="w3-text-blue"><b>Content</b></label>
            <textarea class="w3-input  w3-border w3-margin-bottom" name="text" placeholder="Type here..."><?php
                echo $this->data['text'] ?></textarea>

            <label class="w3-text-blue"><b>Select Category</b></label>

            <select class="w3-select w3-border w3-margin-bottom" name="category" id="category">
                <?php
                foreach ($this->data['topics'] as $topic) : ?>
                    <option value="<?php
                    echo $topic; ?>"><?php
                        echo ucfirst($topic); ?></option>
                <?php
                endforeach; ?>
            </select>

            <label class="w3-text-blue"><b>Upload Image</b></label>
            <input class="w3-input w3-border w3-margin-bottom" name="image" type="file">

            <input type="hidden" name="token" value="<?php
            echo $this->token; ?>">

            <input type="submit" name="submit_btn" class="w3-btn w3-blue w3-margin-top" value="Post">
        </form>
    </div>
    <!-- POST NEWS END -->


<?php
include VIEWS . 'helpers/footer.php'; ?>