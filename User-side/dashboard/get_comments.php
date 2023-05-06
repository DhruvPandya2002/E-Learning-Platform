<?php
include("letter_image.php");
include("comment_server.php");
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'devtown');

$course_id = $_SESSION['premium_id'];

$reply_flag = 0;
// Get the list of comments from the database
$result = mysqli_query($conn, "SELECT * FROM `premium_comment` WHERE `content_id` = '$_SESSION[premium_course_id]' and `course_id` = '$course_id' and  `flag` = 0 and `parent_id` = '$reply_flag' ORDER BY `date` DESC");

// Loop through the comments and display them
while ($row = mysqli_fetch_assoc($result)) {
    $reply_flag = $row['id']; // Set the reply flag to the current comment's ID
    echo '<div class="flex mt-3" id="result"><div class="w-[35px] md:w-[55px] lg:w-[40px] xl:w-[40px] 2xl:w-[40px]">';
    all_comment_letters_images($row['sender']);
    echo '</div>
    <div class="flex flex-col items-start">
        <h2 class="text-lg ml-3 text-[#30559E] font-medium">'.$row['sender'].'<span class="text-sm ml-2">'.$row['date'].'</span></h2>
        <p class="text-xl ml-3">'.$row['comment'].'</p>
        <div>
        <button class="reply_btn ml-1 mt-3 bg-[#DCE1F9] px-4 py-2 rounded-full font-medium text-[#30559E]" comment-id="'.$row['id'].'" onclick="setParentId('.$row['id'].')" id="replyComment">Reply</button>';
            
            // Get the list of replied comments for the current comment
            $replied_result = mysqli_query($conn, "SELECT * FROM `premium_comment` WHERE `content_id` = '$_SESSION[premium_course_id]' and `course_id` = '$course_id' and `flag` = 0 and `parent_id` = '$reply_flag' ORDER BY `date` DESC");

            // Loop through the replied comments and display them
            while ($replied_row = mysqli_fetch_assoc($replied_result)) {
                echo '<div class="flex mt-3 ml-8">
                    <div class="w-[35px] md:w-[55px] lg:w-[40px] xl:w-[40px] 2xl:w-[40px]">';
                   echo all_comment_letters_images($replied_row['sender']);
                    echo '</div>
                    <div class="flex flex-col items-start">
                        <h2 class="text-lg ml-3 text-[#30559E] font-medium">'.$replied_row['sender'].'<span class="text-sm ml-2">'.$replied_row['date'].'</span></h2>
                        <p class="text-xl ml-3">'.$replied_row['comment'].'</p>
                    </div>
                </div>';
            }
            
        echo '</div>
    </div>
    </div>
    </div>';
}
?>
<script>
function setParentId(commentId) {
document.getElementById("commentId").value = commentId;
$('#input_comment').focus();
}

</script>

<script>
// $('#replyComment').click(function(){
//     $('#input_comment').focus();});     
</script>