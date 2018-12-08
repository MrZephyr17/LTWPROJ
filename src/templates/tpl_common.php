<?php

include_once('../database/db_user.php');

function draw_header($username)
{
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans+Condensed:300" rel="stylesheet">
            <script src="../scripts/script.js" defer></script>
        </head>
        <body> 
            <header>
                <h1><a href="../index.php"><img src="../../res/LogoSmall.png" width = "114" height = "132"> </a></h1>
        <?php if ($username != null) {
            ?>
             <div class = "header-flexbox">      
                <div style= "order: 3" class="account">
                    <nav>
                        <ul>   
                        <li><a href="profile.php?id=<?=getUserId($_SESSION['username'])?>"><?=$username?></a></li>
                        <li><a href="../actions/action_logout.php">Logout</a></li>
                        <ul>
                    </nav>
                </div>
                <div style= "order: 2" class="toolbar">
                    <nav>
                        <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="search.php">Search</a></li>
                        <li><a href="create_channel.php">Create channel</a></li>
                        <li><a href="add_story.php">Add story</a></li>
                    </nav>
                </div>
                    </ul>
                </nav>
            <?php
        }else{
            ?>
             <div class = "header-flexbox">        
                <div class="account">
                    <nav>  
                        <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="signup.php">Signup</a></li>
                    </nav> 
                </div>
            </div>
                    </ul>
                </nav>
            <?php
        } ?>
            </div>
            </header>   
            <?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
          <?php foreach($_SESSION['messages'] as $message) { ?>
            <div class="<?=$message['type']?>"><?=$message['content']?></div>
          <?php } ?>
        </section>
      <?php unset($_SESSION['messages']); } ?> 
<?php
} ?>

<?php function draw_footer()
    {
        ?>
  </body>
</html>
<?php
    } ?>

    <?php function draw_header_login()
        {
            ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans+Condensed:300" rel="stylesheet">
            <script src="../scripts/script.js" defer></script>
        </head>
        <body> 
            <div class="login-header">
            <header>
                <h1><a href="../index.php"><img src="../../res/LogoSmall.png" width = "114" height = "132"> </a></h1>
            </header>   
            </div>
            <?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
          <?php foreach($_SESSION['messages'] as $message) { ?>
            <div class="<?=$message['type']?>"><?=$message['content']?></div>
          <?php } ?>
        </section>
      <?php unset($_SESSION['messages']); } ?> 
       <?php } ?>