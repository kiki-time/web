<?php
// 로그인 체크
session_start();
if (isset($_SESSION['member_id']) === false){
    header("Location: /");
    exit();
}
 
// DB Require
require_once("inc/db.php");
 
$member_id = $_SESSION['member_id'];
$post_query = "select post_id, post_content from tbl_post where member_id = ? order by insert_date desc limit 10";
$post_data = db_select($post_query, array($member_id));
 
$last_post_id = count($post_data) > 0 ? $post_data[count($post_data) - 1]['post_id'] : "0";
 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>php-memo 목록</title>
 
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function post_delete(post_id){                
                $.post("/delete.api.php", {'post_id' : post_id})
                .done(function(result){
                    if (result['result']){
                        alert('삭제되었습니다.');
                        $('#post_' + post_id).remove();
                    }
                });
            }
 
            function next_list(){
                var last_post_id = $('#last_post_id').val();
                $.post("/list.api.php", {'last_post_id' : last_post_id})
                .done(function(result){                    
                    if (result['result'] == false){
                        alert('글을 불러오는 데 실패했습니다.');
                        return;
                    }
 
                    if (result['post_data'].length == 0){
                        alert("더이상 글이 없습니다.");
                        return;
                    }
 
                    var ul_list_data = $('#ul_list_data');                    
                    for (var i=0;i<result['post_data'].length;i++) {
                        var post = result['post_data'][i];            
                        var append_li = '<li id="post_' + post['post_id'] + '">"';
                        append_li += post['post_content'];
                        append_li += '<input type="button" value="삭제" onclick="post_delete(\'' + post['post_id'] + '\');return false;" />';
                        append_li += "</li>";
                        ul_list_data.append(append_li);
                        $('#last_post_id').val(post['post_id']);
                    }
                });
            }
        </script>
    </head>
    <body>
        <?php require_once("inc/header.php"); ?>
        <h1>php-memo 목록</h1>
        <form method="POST" action="write.post.php">
            <p>
                <input type="text" id="post_content" name="post_content" style="width:100%" />
            </p>
            <p>
                <input type="submit" id="post_write" value="글 저장" />
            </p>
        </form>
        <ul id='ul_list_data'>
            <?php
            foreach($post_data as $post){                
            ?>
            <li id="post_<?= $post['post_id'] ?>">
                <?= $post['post_content'] ?>
                <input type="button" value="삭제" onclick="post_delete('<?= $post['post_id'] ?>');return false;" />
            </li>
            <?php
            }
            ?>
        </ul>
        <a href="#" id='more' onclick="next_list();">더보기</a>
        <input type='hidden' id='last_post_id' value="<?php echo $last_post_id ?>" />
    </body>
</html>