<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn:600,700&display=swap" rel="stylesheet">
    <title><?php
        echo $this->pageTitle; ?></title>
</head>

<body>
<!-- NAVIGATION START -->
<div class="w3-bar w3-black w3-margin-bottom">
    <span class="w3-bar-item w3-mobile w3-padding-24">News Paper</span>
    <span class="w3-right w3-mobile">
            <a href="<?php
            echo BASE_URL . 'route=home'; ?>" class="w3-bar-item w3-button w3-mobile w3-padding-24">Home</a>

            <?php
            if (\libs\Session::sessionExists('username')) : ?>
                <div class="dropdown w3-dropdown-hover w3-mobile">

                    <a href="#" class="w3-button w3-padding-24"><?php
                        echo ucfirst(\libs\Session::getSession('username')); ?></a>
                    <div class="dropdown w3-dropdown-content w3-bar-block w3-dark-grey">
                        <?php
                        if (\libs\Session::sessionExists('admin')) : ?>
                            <a href="<?php
                            echo BASE_URL . 'route=dashboard&list=users' ?>" class="w3-bar-item w3-button w3-mobile">Dashboard</a>
                            <a href="<?php
                            echo BASE_URL . 'route=addnews' ?>" class="w3-bar-item w3-button w3-mobile">Post News</a>
                            <a href="<?php
                            echo BASE_URL . 'route=logout' ?>" class="w3-bar-item w3-button w3-mobile">Logout</a>
                        <?php
                        else : ?>
                            <a href="<?php
                            echo BASE_URL . 'route=logout' ?>" class="w3-bar-item w3-button w3-mobile">Logout</a>
                        <?php
                        endif; ?>
                    </div>
                </div>
            <?php
            else : ?>
                <a href="<?php
                echo BASE_URL . 'route=register' ?>" class="w3-bar-item w3-button w3-mobile w3-padding-24">Sign Up</a>
                <a href="<?php
                echo BASE_URL . 'route=login' ?>" class="w3-bar-item w3-button w3-mobile w3-padding-24">Login</a>
            <?php
            endif; ?>
        </span>
</div>