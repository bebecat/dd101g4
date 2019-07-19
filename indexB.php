<?php 
session_start();
if($_SESSION[""])

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/indexB.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <title>趣野餐 - 後台管理系統</title>
</head>
<body>
    <div id="menu" class="bp_index_wrapper">
        <div id="logo">
            <img src="scss/img/GengImg/picniclogo.png" alt="LOGO">
        </div>
        <p id="managerName">
            您好, 管理者
            <span id="manager">guest</span>
        </p>
        <p id="welcomeWords">歡迎回來!</p>
        <ul id="menuUl">
            <li><button>會員管理</button></li>
            <li><button>商品管理</button></li>
            <li><button>客製素材管理</button></li>
            <li><button>留言檢舉管理</button></li>
            <li><button>活動報名管理</button></li>
            <li><button>機器人客服</button></li>
            <li><button>員工管理</button></li>
            <button id="logout">登出</button>
        </ul>
    </div>
    <div id="container">
        <div id="content">
            <h3>商品資料管理</h3>
            <button class="step">新增</button>
<!--             <div class="searchBar">
                <select name="" id=""></select>
                <select name="" id=""></select>
                <select name="" id=""></select>
                <input type="text" id="searchName" placeholder="搜尋" size="10">
                <i class="fas fa-search" id="searchClick"></i>
            </div> -->
            <table id="picnic">
                <thead>
                    <tr>
                        <th width="55">編輯</th>
                        <th width="80">編號</th>
                        <th width="80">種類</th>
                        <th width="120">名稱</th>
                        <th width="55">價格</th>
                        <th width="120">圖片</th>
                        <th width="80">上下架</th>
                        <th width="80">熱門推薦</th>
                        <th width="55">未設定</th>
                        <th width="55">未設定</th>
                        <th width="55">刪除</th>
                    </tr>
                </thead>    
                <tbody>
                    <tr>
                        <td>
                            <input type="hidden" name="picnicNo" value="1">
                            <button type="submit" id="subBtn">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>1</td>
                        <td>商品種類</td>
                        <td>商品名稱</td>
                        <td>300</td>
                        <td>
                            <img src="scss/img/GengImg/Screen01/jamB.png" alt="">
                        </td>
                        <td>上架中</td>
                        <td>HOT</td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="hidden" name="picnicNo" value="1">
                            <button type="submit" id="subBtn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                </tbody>
            </table>
<!--             <div id="pagination">
                <ul>
                    <li class="page-item">
                        <a href="" id="last" class="page-link">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a href="" class="page-link nowLoc">1</a>
                    </li>
                    <li class="page-item">
                        <a href="" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="" id="next" class="page-link">
                            <i class="fas fa-chevron-right"></i> 
                        </a>
                    </li>
                </ul>
            </div> -->
        </div>
        <footer>
            <p id="copy">Copyright©2019 Picnic Go</p>
        </footer>
    </div>
</body>
</html>