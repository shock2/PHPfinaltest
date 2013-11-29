<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style type="text/css">
            body, ul.navigation, ul.navigation li, ul.navigation ul, a{
                margin: 0;
                padding: 0;
                font-size: 13px;
                text-decoration: none;
            }
            ul.navigation,ul.navigation li {
                list-style: none;
            }
            ul.navigation li {
                position: relative;
                float: left;
            }
            /* 選單 li 裡面連結之樣式 */
            ul.navigation li a{
                display: block;
                padding: 12px 20px;
                background: #888;
                color: #FFF;
            }
            /* 特定在第一層，以左邊灰線分隔 */
            ul.navigation > li > a{
                border-bottom: 1px solid #CCC;    
                border-left: 1px solid #CCC;
            }
            ul.navigation > li > a:hover{
                color: #666;
                background: #DDD
            }
            ul.navigation ul a {
                width: 120px;
                padding: 10px 12px;    
                color: #666;        
                background: #EEE;
            }
            ul.navigation ul a:hover {        
                background: #CCC;    
            }
            /* 第三層之後，上一層的選單觸發則顯示出來（皆為橫向拓展） */
            ul.navigation ul li:hover > ul{
                display: block;
                position: absolute;
                top: 0;    
                left: 100%;
            }
            ul.navigation li ul{
                display: none;
                float: left;
                position: absolute;
                left: 0;    
                margin: 0;
            }
            /* 當第一層選單被觸發時，指定第二層顯示 */
            ul.navigation li:hover > ul{
                display: block;
            }
            /* 特定在第二層或之後下拉部分 li 之樣式 */
            ul.navigation ul li {
                border-bottom: 1px solid #DDD;
            }
            /* 特定在第二層或之後下拉部分 li （最後一項不要底線）之樣式 */
            ul.navigation ul li:last-child {
                border-bottom: none;
            }                        
        </style>
    </head>

    <body>        
        <ul class="navigation">            
            <li>
                <a href="My.php">支出管理</a>                
            </li>        
            <li>
                <a href="#">支出統計</a>  
                <ul>
                    <a href="Mysearch.php">支出統計查詢</a>
                    <a href="Mygraph.php">支出統計圖表</a>
                </ul>
            </li>
            <li>
                <a href="Logout.php">登出</a>
            </li>
        </ul>
    </body>    
</html>
