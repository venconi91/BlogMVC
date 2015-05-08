<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/content/styles.css" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://bootswatch.com/spacelab/bootstrap.css"/>
        <link href='http://fonts.googleapis.com/css?family=Poller+One' rel='stylesheet' type='text/css'>
        <title>
            <?php if (isset($this->title)) echo htmlspecialchars($this->title) ?>
        </title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/<?php if ($this->isLogedIn) { echo "home/index"; }else{echo "account/login";}?>" class="navbar-brand"><img src="/content/images/site-logo.png"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php if ($this->isLogedIn) { ?>
                            <ul class="nav navbar-nav">
                                <li><a href="/home/index">Home <span class="sr-only">(current)</span></a></li>
                                <li><a href="/posts/index">Posts</a></li>
                                <li><a href="/account/logout">Logout</a></li>
                            </ul>
                        <?php } else { ?>
                            <ul class="nav navbar-nav">
                                <li><a href="/account/login">Login <span class="sr-only">(current)</span></a></li>
                                <li><a href="/account/register">Register</a></li>
                            </ul>
                        <?php } ?>
                        <ul class="nav navbar-nav navbar-right">
                            <form class="navbar-form navbar-left" role="search" action="/posts/search" method="GET" >
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                </div>
                                <input type="submit" class="btn btn-default" value="Search"/>
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <?php include('messages.php'); ?>
