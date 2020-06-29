$url = 'https://www.youtube.com/watch?v=qsBc3Ipo4Fc';
//$url = 'https://youtu.be/qsBc3Ipo4Fc';
$id = NULL;

preg_match('/\?v=([^\&]*)/', $url, $ok);
if(!empty($ok[1])){
    $id = trim($ok[1]);
};

if(empty($id)){
    preg_match('/youtu\.be\/([^\&]*)/', $url, $ok);
    if(!empty($ok[1])){
        $id = trim($ok[1]);
    };
};

if(!empty($id)){

    $strm = array(
        'http'=>array(
            'method' => 'GET',
            'header' => 'referer: https://www.youtube.com/'
        )
    );
    $context = stream_context_create($strm);
    $content = file_get_contents('https://www.youtube.com/get_video_info?html5=1&video_id='.$id, false, $context);      

    parse_str($content, $arr);
    if(is_array($arr)){
        foreach($arr as &$v){
            $v = rawurldecode($v);
            if(is_object(json_decode($v))){
                $v = json_decode($v, true);
            };
        };
    };
    echo '<pre>';
    print_r($arr);
    echo '</pre>';