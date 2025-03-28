<?php
header("content-type:text/html;charset=utf8");
$proxy = "https://www.panda.tw/too/"; //将这一行修改成自己的就好了，注意https,仔细些
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $str = random();
    mkdir($str . '/');
    file_put_contents($str . '/index.html', '<script>window.location.href="' . $url . '"</script>');
    echo "生成的链接：<a href=\"" . $proxy . $str . "\">" . $proxy . $str . "</a>";
} else {
    echo "<!DOCTYPE html>
<html lang=\"zh-cn\">
<head>
    <meta charset=\"utf-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>
    <title>坦白说解密</title>
    <link href=\"http://lib.baomitu.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css\" rel=\"stylesheet\"/>
    <script src=\"http://lib.baomitu.com/jquery/1.12.4/jquery.min.js\"></script>
    <script src=\"http://lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js\"></script>
</head>
<body>
<nav class=\"navbar navbar-fixed-top navbar-default\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <a class=\"navbar-brand\" href=\"./\">坦白说解密者 - 在线版</a>
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->
<div class=\"container\" style=\"padding-top:70px;\">
    <div class=\"col-xs-12 col-sm-10 col-lg-8 center-block\" style=\"float: none;\">
        <div class=\"panel panel-primary\">
            <div class=\"panel-heading\"><h3 class=\"panel-title\">解密地址在线生成</h3></div>
            <div class=\"panel-body\">
                <form action=\"./set.php?mod=dwz_n\" method=\"post\" role=\"form\"><input type=\"hidden\" name=\"do\"
                                                                                    value=\"submit\"/>
                    <div class=\"form-group\">
                        <label>你的QQ：</label>
                        <div class=\"input-group\">
                            <input type=\"text\" name=\"text\" id=\"text\" value=\"\" class=\"form-control\"
                                   placeholder=\"输入你的QQ号\"/>
                            <div class=\"input-group-addon\">
                                <small>最好保证该号对所有人访问</small>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <input type=\"button\" name=\"submit\" value=\"生成\" onclick='fun()'
                               class=\"btn btn-primary form-control\"/><br/>
                    </div>
                </form>
                <div class=\"alert alert-info alert-dismissable\" style=\"background: #d9edf7;color: #31708f;display: none\" id=\"finish\" >
                                          <center> 生成的链接：
                             </center>             </div>
            </div>
            <div class=\"panel-footer\">
                <span class=\"glyphicon glyphicon-info-sign\"></span>
                <font color=\"red\">老解密方式已和谐，无法解密6月9日以后的tb说，全网暂无解密资源以及适用技术。</font><br>故推出此手段，诱惑对方点开你的链接，然后ta就会出现在你的空间访问列表里</br></br>
                使用方法：<br>1.输入你的QQ号，生成专属链接<br>2.然后通过坦白说把此链接发给ta，可以夹带一些诱惑语言，去引导ta点开此链接<br>3.然后在空间访问列表里等待ta的点击（ta如果点了就会出现在你的空间访问列表里）</br>
            </div>
        </div>
<script src=\"//lib.baomitu.com/layer/2.3/layer.js\"></script>
        <script>
            function fun() {
        var ii = layer.load(2, {shade: [0.1, '#fff']});
                var url = \"" . $proxy . "\";
                var qq = $(\"#text\").val();
                $.ajax({
                    type: \"POST\",
                    url: url + \"?url=https://user.qzone.qq.com/\" + qq,
                    error: function (data) {
                        layer.close(ii);
                        alert(\"生成失败，请刷新重试\");
                    },
                    data: {},
                    success: function (data) {
                        layer.close(ii);
                        $(\"#finish\").html(data);
                        $(\"#finish\").hide();
                        $(\"#finish\").slideDown();
                    }
                });
            }
        </script>
    </div>
</div>";
}
function random()
{
    $string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str = "";
    while (strlen($str) < 8) {
        $i = rand(0, 62);
        $str = $str . $string[$i];
    }
    return $str;
}
?>
