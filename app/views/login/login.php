<?php
include VIEWS . 'helpers/header.php'; ?>

    <!-- LOGIN FORM START -->
    <div class="input-wrapper w3-mobile">

        <?php
        if (isset($this->data['errors'])) : ?>
            <div id="" class="w3-panel w3-red w3-round-xlarge w3-center">
                <?php
                foreach ($this->data['errors'] as $error) : ?>
                    <p><?php
                        echo $error ?></p>
                <?php
                endforeach; ?>
            </div>
        <?php
        endif; ?>

        <form id="inputForm" class="w3-container w3-white w3-round-xlarge" action="" method="POST">

            <label class=" w3-text-blue"><b>Username</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="username" value="<?php
            echo $this->data['username'] ?>">

            <label class="w3-text-blue"><b>Password</b></label>
            <input class="w3-input w3-border" type="password" name="password">

            <input type="hidden" name="token" value="<?php
            echo $this->token; ?>">
            <input type="submit" name="submit_btn" class="w3-btn w3-blue w3-margin-top" value="Login">

        </form>
    </div>
    <!-- LOGIN FORM END -->

<?php
include VIEWS . 'helpers/footer.php'; ?>