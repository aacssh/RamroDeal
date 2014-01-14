<?php
function comment_form($commentList){
    $user = new User();
    if($user->isLoggedIn()){
?>
    <form action='' method='post' class="form-horizontal col-lg-6 col-sm-6">
        <input type="hidden" id="hide" name="hide" />
        <div class="control-group">
            <p><label class="control-label" for="name">Comment:</label>
            <div class="controls">
                <textarea name="comment" rows='6' placeholder="Write something..." required></textarea>
            </div></p>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" name="submit" value="comment" id="submit" class="btn btn-large btn-primary input-large"/>Submit</button>
            </div>	
        </div>
    </form>
<?php } ?>
    <section class='class= "col-lg-6 col-sm-6'>
        <?php foreach($commentList as $comment): ?>
            <?php echo '<b>'.$comment->username.'</b>    <i>'. strftime("%B %d %Y at %I:%M %p", strtotime($comment->created)).'</i><br />';
            echo $comment->body.'<br><br>'; ?>
        <?php endforeach; ?>
    </section>
<?php
}
?>