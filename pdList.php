<?php
session_start();
// $_session['qty'];
$errMsg="";
try{
  require_once("connectBooks.php");
  // $sql="select * from officialprod";
  // $products=$pdo->query($sql);
  // $prodRows=$products->fetchAll(PDO::FETCH_ASSOC);

  $cookSql="
  select * 
  from officialprod 
  where prodType=:prodType
  ";
  $cooks=$pdo->prepare($cookSql);
  $cooks->bindValue(":prodType","cook");
  $cooks->execute();

  $pdSql="
  select * 
  from officialprod 
  where prodType=:prodType limit 3";
  $pds=$pdo->prepare($pdSql);
  $pds->bindValue(":prodType","pd");
  $pds->execute();

  // $matSql="select * from officialprod where prodType=:prodType";
  // $mats=$pdo->prepare($matSql);
  // $mats->bindValue(":prodType","mat");
  // $mats->execute();
  $popularSql="
  select * 
  from officialprod 
  where prodPopular=:prodPopular";
  $popular=$pdo->prepare($popularSql);
  $popular->bindValue(":prodPopular",1);
  $popular->execute();

// $popularItem=$popular->fetch(PDO::FETCH_ASSOC);

}catch(PDOException $e){
  echo "錯誤：",$e->getMessage(),"<br>";
  echo "行號：",$e->getLine(),"<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>趣野餐｜ 野餐周邊</title>
    <link rel="SHORTCUT ICON" href="./scss/img/h_f_img/rwd-logo.png" />
    <link rel="stylesheet" href="./css/machine.css" />
    <link rel="stylesheet" href="./css/h_f_becca.css" />
    <link rel="stylesheet" href="./css/pdList-1.css" />
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/h_f_becca.js"></script>
    <script src="js/machine.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/ScrollMagic.min.js"></script>
    <script src="js/debug.addIndicators.min.js"></script>
    <script src="js/animation.gsap.min.js"></script>
    <style>
    
    .hidePd{
    display:none;
    }
  </style>
  </head>
  <body>
    <div class="pdP_wrapper">
      <!-- navbar -->
      <nav class="navbar_container">
        <input type="checkbox" id="menuBg" />
        <div class="header_cloud">
          <div class="cloudF"></div>
          <div class="cloudB"></div>
          <div class="cloudR"></div>
        </div>
        <div class="hb_box">
          <a href="index.html"><div class="logo"></div></a>
          <label class="hb" for="menuBg">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
            <div class="bar bar3"></div>
          </label>
        </div>
        <div class="nav_wrapper">
          <ul class="nav_content">
            <a href="customizedP.html"><li class="cus">客製野餐籃</li></a>
            <a href="contest.html"><li>美籃票選</li></a>
            <a href="pdList.html"><li class="here">野餐周邊</li></a>
            <a href="index.html">
              <li class="logo">
                <h1>趣野餐</h1>
              </li>
            </a>
            <a href="activity.html"><li>野餐活動</li></a>
            <a href="aboutus.html"><li>籃子故事</li></a>
            <a href="game.html"><li>賺折扣券</li></a>
          </ul>
  
          <ul class="icon">
            <li class="hi">董董,你好</li>
            <a href="memeber.html"
              ><li class="member">
                <img
                  id="member_icon"
                  src="./scss/img/h_f_img/member.png"
                  alt="member"
                /></li
            ></a>
            <a href="cart.php"
              ><li class="cart">
                <span class="cart_circle" id="cart_circle">
                  <span class="cart_count" id="cart_count"></span>
                </span>
                <img
                  id="cart_icon"
                  src="./scss/img/h_f_img/cart.png"
                  alt="cart"
                /></li
            ></a>
          </ul>
          <div class="clear"></div>
        </div>
      </nav>
      <!-- 機器人 -->
      <div class="machine">
        <div class="machine_check">
          <div class="machine_body">
            <img src="scss/img/mch_img/GengImg/animal/body.png" alt="" />
            <div class="machine_handR">
              <img src="scss/img/mch_img/GengImg/animal/rightHand.png" alt="" />
            </div>
            <div class="machine_handL">
              <img src="scss/img/mch_img/GengImg/animal/leftHand.png" alt="" />
            </div>
            <div class="machine_earsR">
              <img src="scss/img/mch_img/GengImg/animal/rightEars.png" alt="" />
            </div>
            <div class="machine_earsL">
              <img src="scss/img/mch_img/GengImg/animal/leftEars.png" alt="" />
            </div>
            <div class="machine_tail">
              <img src="scss/img/mch_img/GengImg/animal/tail.png" alt="" />
            </div>
          </div>
          <div class="machine_dialog">
            <!-- <img src="scss/img/mch_img/GengImg/dialog.png" alt="" /> -->

            <div class="machine_txt">
              <p>點我 <span>問我</span></p>
            </div>
          </div>
        </div>
      </div>
      <!-- 房子 -->
      <div class="chatbot_wrapper">
        <!-- <img src="./scss/img/mch_img/GengImg/houseChat.png" alt="chathouse" /> -->
        <!-- 關起來 -->
        <div class="cancel" id="close_btn">Ｘ</div>
        <!-- 對話框框 -->
        <div class="chatBot_container" id="robot_conversation-block">
          <div class="chatBot_content" id="chabot_conversation_box">
            <p id="chatBot_content" class="robot_text">
              ♥ 去野餐： HiHi 去野餐 ! 野餐趣 ! 有什麼想問我呢?
            </p>
          </div>
        </div>

        <!-- 送出 -->
        <div class="chatBot-text-Wrap">
          <input
            type="text"
            class="chatBot-text"
            id="user_message"
            placeholder="輸入你想問的"
            name="userkey"
          />
          <!-- <div id="UserText"></div> -->
          <button type="submit" id="user_btn_send" class="btn_send">
            送出
          </button>
        </div>
        <!-- 關鍵字 -->
        <ul class="chatBot_keyword">
          <li id="ask_price">價格</li>
          <li id="ask_cus">客製</li>
          <li id="ask_game">遊戲</li>
          <li id="ask_discount">優惠</li>
          <li id="ask_news">最新消息</li>
        </ul>
      </div>

      <!-- 內文開始 -->
      <section class="pdP_hero_container">
        <div class="sun">
          <img src="./scss/img/pdImg/pd/sun.png" alt="sun" />
        </div>
        <div class="cloud">
          <img src="./scss/img/pdImg/pd/clioud01.png" alt="cloud" />
        </div>

        <div class="parallax_3d">
          <div class="parallax_3d_inner">
            <h3 class="recommend_title">
              今日<span class="good">好</span>推薦
            </h3>
            <?php
            while($popularRow = $popular -> fetch(PDO::FETCH_ASSOC)){
        ?> 
            <div class="pdP_recommend_card">
              <a href="javascript"
                ><img
                  src="<?php echo $popularRow["PicPath"]; ?>"
                  alt="pd_recommend"
                />
                <h2><?php echo $popularRow["ProdName"] ;?></h2>
              </a>
            </div>
            <?php 
            }
            ?>
          </div>
        </div>
      </section>
       <!-- pdlist -->
      <section class="pdP_pdlist_container">
        <div class="butterfly_bg secen_02">
          <img src="./scss/img/pdImg/bg/butterfly_bg.png" alt="bg" />
        </div>
        <ul class="filter">
          <li class="title">篩選：</li>
          <a href="#"
            ><li class="all_filter">
              <img src="./scss/img/pdImg/pd/pd_filter_all.png" alt="mat" />
              <h2 class="pd_location">全商品</h2>
            </li>
          </a>
          <a href="#"
            ><li class="mat_filter">
              <img src="./scss/img/pdImg/pd/filter_mat.png" alt="mat" />
              <h2>野餐墊</h2>
            </li></a
          >
          <a href="#"
            ><li class="fork_filter">
              <img src="./scss/img/pdImg/pd/filter_spoon.png" alt="fork" />
              <h2>餐具</h2>
            </li></a
          >
          <a href="#"
            ><li class="box_filter">
              <img src="./scss/img/pdImg/pd/filter_box.png" alt="box" />
              <h2>分裝配備</h2>
            </li></a
          >
          <div id="keypoint02"></div>

        </ul>
        <div class="pd_card_container" >
          <!-- // -->

         <?php
         //跑cook商品
            while($cookRow = $cooks -> fetch(PDO::FETCH_ASSOC)){

              $psn = $cookRow["ProdNo"];
              // if( isset($_SESSION["cart"]) && isset($_SESSION["cart"][$psn])){
              //   $qty = $_SESSION["cart"][$psn]["qty"];
              // }else{
              //   $qty = 0;
              // }
        ?> 

          <div class="pd_card_content col-1 col-1md fork" id="pdCard">
              <div class="dicorateBox">
                <div class="baby">
                  <img src="./scss/img/pdImg/pd/card_baby.png" alt="baby" />
                </div>
                <div class="nuts">
                  <img src="./scss/img/pdImg/pd/card_nuts.png" alt="nuts" />
                </div>
              </div>
              <div class="card_content col-1 col-1md ">
                <h2 class="title"><?php echo $cookRow["ProdName"]; ?></h2>
                <div class="pic">
                  <img src="<?php echo $cookRow["PicPath"]; ?>" alt="pd" />
                </div>
                <ul class="txt">
                  <li class="discrib"><?php echo $cookRow["ProdDesc"]; ?></li>
                  <li class="price">$<?php echo $cookRow["ProdPrice"];?></li>
                </ul>
                <form class="btn_qty_box" action="">
                <input type="hidden" class="prod_btn_id" value="<?php echo $cookRow["ProdNo"] ?>">
                  <ul>
                    <li class="btn_qty_box" id="addQty">
                      <input class="qty_minus" type="button" value="-" />
                      <span class="qty">1</span>
                      <input class="qty_plus" type="button" value="+" />
                    </li>
                    <li  class="btn_submit_box" id="<?php echo $cookRow["ProdNo"]; ?>">
                      加入購物車
                      <input
                        class="add_to_cart"
                        type="hidden"
                        name="add_to_cart"
                        value="<?php echo $cookRow["ProdNo"],"|",$cookRow["ProdName"],"|",$cookRow["ProdPrice"],"|",$cookRow["PicPath"]; ?>"
                      />
                    </li>
                  </ul>
                </form>
              </div>
          </div>
          <?php
          }
          ?>
         <?php
          //跑pds商品
            while($pdRow = $pds -> fetch(PDO::FETCH_ASSOC)){
              $i=1;
              $hide = ($i++>3)? 'hide':'';
        ?> 
          <div class="pd_card_content col-1 col-1md box <?php $hide ?>" id="pdCard">
              <div class="dicorateBox">
                <div class="baby">
                  <img src="./scss/img/pdImg/pd/card_baby.png" alt="baby" />
                </div>
                <div class="nuts">
                  <img src="./scss/img/pdImg/pd/card_nuts.png" alt="nuts" />
                </div>
              </div>
              <div class="card_content col-1 col-1md ">
                <h2 class="title"><?php echo $pdRow["ProdName"]; ?></h2>
                <div class="pic">
                  <img src="<?php echo $pdRow["PicPath"]; ?>" alt="pd" />
                </div>
                <ul class="txt">
                  <li class="discrib"><?php echo $pdRow["ProdDesc"]; ?></li>
                  <li class="price">$<?php echo $pdRow["ProdPrice"];?></li>
                </ul>
                <form class="btn_qty_box" action="">
                  <!-- 抓 -->
                  <input type="hidden" class="prod_btn_id" value="<?php echo $pdRow["ProdNo"] ?>">
                  <ul>
                    <li class="btn_qty_box" id="addQty">
                      <input class="qty_minus" type="button" value="-" />
                      <span class="qty">1</span>
                      <input class="qty_plus" type="button" value="+" />
                    </li>
                    <li  class="btn_submit_box" id="<?php echo $pdRow["ProdNo"]; ?>">
                      加入購物車
                      <!-- 抓 -->
                      <input
                        class="add_to_cart"
                        type="hidden"
                        value="<?php echo $pdRow["ProdNo"],"|",$pdRow["ProdName"],"|",$pdRow["ProdPrice"],"|",$pdRow['PicPath']; ?>"
                      />
                    </li>
                  </ul>
                </form>
              </div>
          </div>
          <?php
          }
          ?>


        </div>
        <div id="keypoint01"></div>
        <div class="see_more" action="">
          <button id="toggle_see_more" class="see_btn">查看更多</button>
        </div>
      </section>

      <div class="pd_cute_bg"></div>

      <!-- 客製頁  -->
      <section class="pd_Customize_container" id="pd_cus">
        <!-- <div id="keypoint"></div> -->

        <div class="fly_animal secen_01" id="moveFly">
          <img src="./scss/img/pdImg/pd/animal.png" alt="animal" />
        </div>
        <div class="pd_Customize_box">
          <div class="left">
            <!-- <div class="bg">
                    <img src="./scss/img/pdImg/pd/pd_ciecleL.png" alt="bg" />
                  </div> -->
            <div class="pic_dl">
              <img src="./scss/img/pdImg/pd/pd_ribbon.png" alt="dr" />
            </div>
          </div>
          <div class="middle">
            <img src="./scss/img/pdImg/pd/pd_circleM.png" alt="bg" />
            <div class="txt">
              凡購客製野餐籃，即可享商品優惠<br />
              一起去野餐吧！
            </div>
            <div class="pd_cus_box">
              <img src="./scss/img/pdImg/pd/pd_cus_basket.png" alt="cus" />
              <div class="decorate">
                <div class="dr">
                  <img src="./scss/img/pdImg/pd/pd_ribbon_1.png" alt="dr" />
                </div>
                <div class="dl">
                  <img src="./scss/img/pdImg/pd/pd_ribbon.png" alt="dl" />
                </div>
              </div>
            </div>
            <a href="customizedP.html"
              ><span class="go_to_cus">前往客製頁</span></a
            >
          </div>
          <div class="right">
            <!-- <div class="bg">
                    <img src="./scss/img/pdImg/pd/pd_circleR.png" alt="bg" />
                  </div> -->
            <div class="pic_dr">
              <img src="./scss/img/pdImg/pd/pd_ribbon_1.png" alt="dl" />
            </div>
          </div>
        </div>
      </section>

      <footer class="footer_wrapper">
        <ul>
          <li>電話:02-2665-1234</li>
          <li>Email:picnic@picnic.com</li>
          <li>地址:新北市板橋區-野餐路4號</li>
          <li class="copy">Copyright©2019</li>
        </ul>
      </footer>
      <script src="js/pdListNew.js"></script>
    </div>

    <script>
      // new Vue({
      //   el: "#addQty",
      //   data: {
      //     count: 0
      //   }
      // });
      //start_ajax

    </script>
  </body>
</html>
