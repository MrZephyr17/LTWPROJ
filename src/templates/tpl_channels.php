<?php function draw_channels($channels){
    ?>
<nav class="channels">
  <ul>
  <?php
      foreach ($channels as $channel) {
          ?>
      <li><a href="../pages/channel.php?id=<?=$channel['channel_id']?>"><?=$channel['channel_name']?></a></li>
  <?php
      } ?>
  </ul>
    </nav>
    <?php
}

function draw_channel_info($channel){

    $id = $channel['channel_id'];
    ?>
  <section id="channelInfo">
    <form method="post">
      <div class="channel-flexbox" style="background: url(../images/originals/<?=$channel['channel_header']?>.jpg);    background-size: cover;
    background-position-y: center;">
      </div><?php
          if(isset($_SESSION['username'])){
        ?>
        <button name="subscribe">
        <?php
          if(isUserSubscribed($id, getUserId($_SESSION['username'])))
            echo 'Unsubscribe';
          else
            echo 'Subscribe';
        ?>
        </button>
        <?php
        }
        ?>
        <input type="hidden" name="channel_id" value="<?=$id?>">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
    </form>
        <div class="channel">
          <?=$channel['channel_name']?>
        </div>
        <div class="subscribers">
          Subscribers: <?=getNumSubscribers($id)?>
        </div>
  </section>

<?php
}
function draw_channel_adder(){ ?>
<article class="new-element">
    <form action="../actions/action_add_channel.php" method="post" enctype="multipart/form-data">
      <input type="text" name="channel_name" placeholder="Channel name">
      <textarea rows="4" cols="50" name="channel_description" placeholder="What is this channel for?"></textarea>
      <input type="file" name="image" id="file" class="inputfile" >
      <label for="file"><i class="fas fa-upload"></i> Choose a file</label>
      <input type="submit" value="Submit">
      <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
    </form>
</article>
<?php
}