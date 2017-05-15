<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'calculator');

if (!mysql_connect(DB_HOST, DB_USER, DB_PASS)) {
    exit('Cannot connect to server');
}
if (!mysql_select_db(DB_NAME)) {
    exit('Cannot select database');
}

mysql_query('SET NAMES utf8');

function search ($query)
{
    $query = trim($query);
    $query = mysql_real_escape_string($query);
    $query = htmlspecialchars($query);

    if (!empty($query))
    {
        if (strlen($query) < 3) {
            $text = '<p>Слишком короткий поисковый запрос.</p>';
        } else if (strlen($query) > 128) {
            $text = '<p>Слишком длинный поисковый запрос.</p>';
        } else {
            $q = "SELECT `page_id`, `nume_client`, `prenume_client`
                  FROM `client` WHERE";
                 if (isset($_POST["cut3"])) {
                      $q="`adresa` LIKE '%$query%' OR";}
                 if(isset($_POST["cut1"])){
                      $q=" `nume_client` LIKE '%$query%' OR";}
                 if(isset($_POST["cut2"])){
                      $q="`prenume_client`LIKE '%$query%' OR `";}
                      $q = rtrim($sql, "OR ");
            $result = mysql_query($q);

            if (mysql_affected_rows() > 0) {
                $row = mysql_fetch_assoc($result);
                $num = mysql_num_rows($result);

                $text = '<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p>';

                do {
                    // Делаем запрос, получающий ссылки на статьи
                    $q1 = "SELECT `nume_client`,`prenume_client` FROM `client` WHERE `id_client` = '$row[page_id]'";
                    $result1 = mysql_query($q1);

                    if (mysql_affected_rows() > 0) {
                        $row1 = mysql_fetch_assoc($result1);
                    }

                    $text .= '<p><a> href="'.$row1['link'].'/'.$row['category'].'/'.$row['uniq_id'].'" title="'.$row['title_link'].'">'.$row['title'].'</a></p>
                    <p>'.$row['desc'].'</p>';

                } while ($row = mysql_fetch_assoc($result));
            } else {
                $text = '<p>По вашему запросу ничего не найдено.</p>';
            }
        }
    } else {
        $text = '<p>Задан пустой поисковый запрос.</p>';
    }

    return $text;
}
?>
