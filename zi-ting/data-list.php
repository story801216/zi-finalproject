<?php
    include __DIR__. '/partials/init.php';
    $title = '資料列表';

    // 3.固定每一頁最多顯示幾筆
    $perPage = 5;

// query string parameters關鍵字查詢後的分頁問題處理
//20210811133034-28:40~35:15
$qs = [];

// 關鍵字查詢20210811133034-0:21~20:25
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

    // 4.用戶決定查看第幾頁，如果沒有設定的話預設值就為 1
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    $where = ' WHERE 1 '; // 這邊的字串「1」，代表是true的意思
    if(! empty($keyword)){  //如果關鍵字的值不是空的，就執行if裡面的程式碼

        // $where .= " AND `name` LIKE '%{$keyword}%' "; 
        // 這邊的「.」代表著接字串的功能
        // ↑這樣會有sql injection 漏洞所以不推薦這樣使用 
        

        $where .= sprintf(" AND `name` LIKE %s ", $pdo->quote('%'. $keyword. '%'));
        $qs['keyword'] = $keyword;
    };
    

    // 1.總共有幾筆
    // 透過SELECT count(1) FROM address_book來拿到總筆數
    $totalRows = $pdo->query("SELECT count(1) FROM address_book")
        ->fetch(PDO::FETCH_NUM)[0]; // 把結果變成索引式陣列，並只拿第一欄([0])資料(0，1，2，3，...)，再透過SELECT count(1) FROM，來計算總共拿到幾筆資料

        // echo $totalRows; exit; -> 驗證是否有拿對資料總數量

    // 2.總共有幾頁, 才能生出分頁按鈕
    $totalPages = ceil($totalRows/$perPage); // ceil:正數時無條件進位
    
    
    $rows = [];
    // 要有資料才能讀取該頁的資料(避免沒有資料(也就沒有分頁)，導致header('Location: ?page='. $totalPages)會不斷的循環，最終出現重新導向過多的錯誤訊息20210811111500-01:57~05:12)
    if($totalRows!=0) {

        // 讓 $page 的值在安全的範圍
        if($page<1){
            header('Location: ?page=1');   // 如果$page<1，就轉跳到第一頁(?page=1')
            exit;
        }
        if($page>$totalPages){
            header('Location: ?page='. $totalPages); // 如果用戶所選頁面大於時候總頁數的值，就跳轉到最後一頁($totalPages)
            exit;
        }

        $sql = sprintf("SELECT * FROM address_book %s ORDER BY sid DESC LIMIT %s, %s",
         $where,
           ($page - 1) * $perPage, 
           $perPage);            
           // ASC
// 排序完後所呈現的第一筆資料↑        ↑一次只顯示幾筆資料
// sprintf():函數把格式化的字符串寫入一個變量(%s)中

    $rows = $pdo->query($sql)->fetchAll();

// 在此可以藉由在網址後方輸入?page=1，來切換資料顯示的頁面，但如果輸入1以下的話(0，-1，-2)就會報錯
};

?>
<?php include __DIR__. '/partials/html-head.php'; ?>
<?php include __DIR__. '/partials/navbar.php'; ?>

<!-- 下方為資料呈現的畫面 -->    
<style>
        table tbody i.fas.fa-trash-alt {
            color: darkred;
        }
    </style>
<div class="container">
 <div class="row" >   <!-- 製作查詢功能的欄位20210811111500-41:56~49:00 -->
        <div class="col">
            <form action="data-list.php" class="form-inline my-2 my-lg-0 d-flex justify-content-end">
                <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search"
                       value="<?= htmlentities($keyword) ?>"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
   <div class="row">  <!-- 製作分頁功能 -->
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-end">

                     <li class="page-item <?= $page<=1 ? 'disabled' : '' ?>">   
                                                    <!-- ↑disabled:bs的classname，會將所選按鈕反黑無法被點擊;如果用戶查看的頁碼$page<=1的話，就讓「上一頁」按鈕無法被點擊(反黑) -->
                    <!-- ↓a class="page-link":使用icon製作「上一頁」的功能按鈕($page-1)  -->
                       <a class="page-link" href="?<?php
                        $qs['page']=$page-1;
                        echo http_build_query($qs);
                        ?>">
                                             <!-- ↑開頭?代表url指向的是此檔案的網址的後面(data-list.php) -->
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>

                    <!-- 利用for迴圈來產生分頁 -->
                    <?php for($i=$page-5; $i<=$page+5; $i++): // 最多秀出6頁分頁按鈕
                        if($i>=1 and $i<=$totalPages):
                            $qs['page'] = $i; 
                        ?> 
                        <!-- i的值必須要>=1 並且 i<=總頁數的最後一頁，才會出現下方的li後的部分 -->
                                       <!-- ↓$i==$page:假設目前頁碼($i)與用戶查看的頁碼($page)相同，就輸出'active'(active:bs的classname，會將所選頁碼會反藍)  -->
                    <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                                                        <!-- ↓連結網址  ↓a連結顯示的文字 -->
                        <a class="page-link" href="?<?= http_build_query($qs) ?>"><?= $i ?></a> <!-- 利用a連結來輸出i的值(也就是頁碼) -->
                    </li>

                    <?php endif;
                        endfor; ?>
                                            <!-- $page>=$totalPages:如果所選頁面為總頁數的值(也就是最後一頁)，就讓下一頁的按鈕反黑 -->
                    <li class="page-item <?= $page>=$totalPages ? 'disabled' : '' ?>">
                     <!-- a class="page-link" 使用icon製作「下一頁」的功能按鈕($page+1)  -->
                     <a class="page-link" href="?<?php
                        $qs['page']=$page+1;
                        echo http_build_query($qs);
                        ?>">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col"><i class="fas fa-trash-alt"></i></th> <!-- 刪除icon title -->
                    <th scope="col">sid</th>
                    <th scope="col">account</th>
                    <th scope="col">password</th>
                    <th scope="col">name</th>
                    <th scope="col">idnumber</th>
                    <th scope="col">email</th>
                    <th scope="col">mobile</th>
                    <th scope="col">birthday</th>
                    <th scope="col">address</th>
                    <th scope="col"><i class="fas fa-edit"></i></th> <!-- 編輯的icon title -->
                </tr>
                </thead>
                <tbody>
                <?php foreach($rows as $r): ?>
                <tr data-sid="<?= $r['sid'] ?>">
                <!-- data-sid:代表的是開發人員自己定義的屬性，連屬性名都可以自己定義 20210810101652-37:05~42:19 -->
                 <td> <!-- 刪除資料的部分，20210810101652-13:08~17:03 -->
                      <a href="data-delete.php?sid=<?= $r['sid'] ?>" 
                            onclick="return confirm('確定要刪除編號為 <?= $r['sid'] ?> 的資料嗎？')"   
                        ><!-- 點擊後觸發onclick事件並跳出確認與否的表單，若選擇取消，就會回傳false，取消預設行為，就不會連到"data-delete.php?sid=<?= $r['sid'] ?>，反之確認 -->
                         <!-- ps:當觸發confirm事件時，所有的js都會停下來，等完成confirm事件後才會繼續執行 -->
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <!-- Button trigger modal20210811111500-06:19~41:53 -->
                        <!-- 
                        <button type="button" class="btn btn-outline-warning del1btn" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </button> 
                        -->
                    </td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['account'] ?></td>
                    <td><?= $r['password'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['idnumber'] ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <!-- strip_tags的功能是用來消除 PHP 或 HTML 標籤，舉凡 HTML 的各種標籤如 <p> tag、<br> tag、<b> ... 或是 PHP 的 tags、註解內容等，都可以用strip_tags函數清除，這樣就能避免讓惡意用戶在輸入資料時，植入js or 其他惡意的「跨網站指令碼攻擊(XSS)」，但老師不推薦使用
                    <td><?= strip_tags($r['address']) ?></td>
                    -->
                    <!-- htmlentities這個函式轉換所有含有對應“html實體”的特殊字元，比如貨幣表示符號歐元英鎊等，例如'<scripts>123</scripts>'在儲存時候就會原封不動的連同<scripts></scripts>存下來，並顯示在頁面上，就不會讓他scripts標籤生效，這串<scripts>123</scripts>自然也不會渲染到我的網頁了，所以建議只要是能夠輸入文字的地方都要這樣做防範，ex:留言板，表單輸入的部分 -->
                    <td><?= htmlentities($r['address']) ?></td>
                    <td>
                        <a href="data-edit.php?sid=<?= $r['sid'] ?>"><!-- 編輯資料的部分 -->
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>                
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
                    <!-- php過濾輸入操作之htmlentities與htmlspecialchars用法分析:https://reurl.cc/VEb24b -->
        </div>
    </div>
    

</div>
    


<?php include __DIR__. '/partials/scripts.php'; ?>
<?php include __DIR__. '/partials/html-foot.php'; ?>