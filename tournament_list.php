<?php
if (!file_exists('challonge.class.php')) {
  echo "challonge.class.php doesn't exist!";
  return;
}
require_once 'challonge.class.php';
require_once 'keylist.php';

?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>Tournament List Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/tournament.less">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="site-notice">
      <a href="http://www.gametotal.org">
        <em>GT社区红警 3 赛事中心成立啦！</em>
      </a>
    </div>
    <header class="site-header jumbotron">
      <div class="site-nav">
        <a href="#">QQ登录</a>
        <span>/</span>
        <a href="http://bangz.me">博客</a>
        <span>/</span>
        <a href="#">关于</a>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>红警 3 赛事中心</h1>
            <p>
              由 GT 社区打造的快速、易用、科学的红警 3 赛事管理系统<br>
              <span class="tournament-amout">
                共收录了
                <strong>99</strong>
                场比赛
              </span>
            </p>
            <form class="" role="search">
              <div class="form-group">
                <input type="text" class="form-control search clearable" placeholder="搜索比赛，例如：COT">
                <i class="fa fa-search">&nbsp;</i>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      <h1 class="text-center">
        最新比赛列表
      </h1>
    </div>
    <div class="container">
      <?php foreach ($apiKeyList as $key => $value) {
        $api_instance[$key] = new ChallongeAPI($value);
        $api_instance[$key]->verify_ssl = false;
        $tournamentsList = $api_instance[$key]->getTournaments()->tournament;
        foreach ($tournamentsList as $value) {?>
      <div id="<?php echo $value->id ?>" class="row tournament-info" onclick="javascript:void(0)">
        <div class="logo col-md-2">
          <img class="img-rounded" src="images/RA3_icon.png" alt="logo" width="100px" height="100px"/>
        </div>
        <div class="col-md-8">
          <h4 class="tournament-title"><?php echo $value->name ?></h4>
          <p class="description">
            <?php echo $value->description ?>
          </p>
          <p class="population">
            参与人数：<?php echo $value->{'participants-count'} ?>
          </p>
        </div>
        <div class="col-md-2 tournament-organizer">
          <p>
            发起人：
            <a href="#"><?php echo $key ?></a><br>
            发起时间：
            <?php
              $phpTimestamp = strtotime(substr($value->{'created-at'}, 0, 10).' '.substr($value->{'created-at'}, 11, 8));
              echo date('y-m-d', $phpTimestamp);
            ?>
          </p>
          当前进度：<br>
          <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $value->{'progress-meter'} ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $value->{'progress-meter'} ?>%">
              <span class="sr-only"><?php echo $value->{'progress-meter'} ?>% Complete</span>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php } ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <center>
          <small>Copyright © 2016 GT即时战略游戏社区 Developed By <a href="http://bangz.me">BangZ</a></small>
        </center>
      </div>
    </div>
  </body>
</html>
