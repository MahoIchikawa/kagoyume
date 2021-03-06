<?php
require_once 'defineUtil.php';
/**
 * フォームの再入力時に、すでにセッションに対応した値があるときはその値を返却する
 * @param type $name formのname属性
 * @return type セッションに入力されていた値
 */
function form_value($name){
    if(isset($_POST['mode']) && $_POST['mode']=='REINPUT'){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }
}

/**
 * ポストからセッションに存在チェックしてから値を渡す。
 * 二回目以降のアクセス用に、ポストから値の上書きがされない該当セッションは初期化する
 * @param type $name
 * @return type
 */
function bind_p2s($name){
    if(!empty($_POST[$name])){
        $_SESSION[$name] = $_POST[$name];
        return $_POST[$name];
    }else{
        $_SESSION[$name] = null;
        return null;
    }
}

/**
 * @brief アプリケーションID
 * Yahoo! JAPANが提供するWeb APIを利用するアプリケーションには、アプリケーションIDが必要です。
 * Yahoo!デベロッパーネットワークで取得したアプリケーションIDを設定してください。
 * @var string
 */

//取得したアプリケーションIDを設定
$appid = "dj0zaiZpPTl5bTFMbEFMd0RCTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZDk-";

/**
 * @brief カテゴリーID一覧
 * 商品カテゴリの一覧です。
 * キーにカテゴリID、値にカテゴリ名が入っています。
 * @var array
 */
$categories = array(
		"1" => "すべてのカテゴリから",
		"13457"=> "ファッション",
		"2498"=> "食品",
		"2500"=> "ダイエット、健康",
		"2501"=> "コスメ、香水",
		"2502"=> "パソコン、周辺機器",
		"2504"=> "AV機器、カメラ",
		"2505"=> "家電",
		"2506"=> "家具、インテリア",
		"2507"=> "花、ガーデニング",
		"2508"=> "キッチン、生活雑貨、日用品",
		"2503"=> "DIY、工具、文具",
		"2509"=> "ペット用品、生き物",
		"2510"=> "楽器、趣味、学習",
		"2511"=> "ゲーム、おもちゃ",
		"2497"=> "ベビー、キッズ、マタニティ",
		"2512"=> "スポーツ",
		"2513"=> "レジャー、アウトドア",
		"2514"=> "自転車、車、バイク用品",
		"2516"=> "CD、音楽ソフト",
		"2517"=> "DVD、映像ソフト",
		"10002"=> "本、雑誌、コミック"
);

/**
 * @brief ソート方法一覧
 *
 * 検索結果のソート方法の一覧です。
 * キーに検索用パラメータ、値にソート方法が入っています。
 * @access private
 * @var array
 *
 */
$sortOrder = array(
                   "-score" => "おすすめ順",
                   "+price" => "商品価格が安い順",
                   "-price" => "商品価格が高い順",
                   "+name" => "ストア名昇順",
                   "-name" => "ストア名降順",
                   "-sold" => "売れ筋順"
                   );

$shipping_types = array(
                  "1" => "郵便",
                  "2" => "宅急便",
                  "0" => "その他",
                  );
/**
 * @brief 特殊文字を HTML エンティティに変換する
 * @param string $str 変換したい文字列
 *
 * @return string html用に変換した文字列
 *
 */

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function writeLog($label,$content){

  $file_path = "../logs/log.txt";
	$time_format = "Y-m-d H:i:s";
	$myfile = fopen($file_path, "a+") or die("Unable to open file!");

  $start_time = date($time_format);
  fwrite($myfile, $start_time . "[$label]\n");
  fwrite($myfile, $content."\n");

  fclose($myfile);
}

function getItemByCode($item_code){
  $appid = "dj0zaiZpPTl5bTFMbEFMd0RCTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZDk-";
  $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$item_code&image_size=600&responsegroup=large";
  $xml = simplexml_load_file($url);
  if ($xml["firstResultPosition"] != 0) {
      $hit = $xml->Result->Hit;
      return $hit;
  }
  return null;
}

//検索したURLを残す
function getSearchUrl(){
  $url = SEARCH.'?';
  if(isset($_COOKIE['sort'])){
    $sort = $_COOKIE['sort'];
    $url .= 'sort='.$sort.'&';
  }
  if(isset($_COOKIE['category_id'])){
    $category_id = $_COOKIE['category_id'];
    $url .= 'category_id='.$category_id.'&';
  }
  if(isset($_COOKIE['search_term'])){
    $search_term = $_COOKIE['search_term'];
    $url .= 'search_term='.$search_term;
  }
  return $url;
}
?>
