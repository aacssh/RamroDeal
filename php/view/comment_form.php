<?php
function comment_form($commentList){
?>
<section class="row">
    <form action='' method='post' class="form-horizontal">
        <section class="span12">
            <header>
                <h3>Comments:</h3>
            </header>
            <input type="hidden" id="hide" name="hide" />
            <div class="control-group">
                <p><label class="control-label" for="name">Comment:</label>
                <div class="controls">
                    <textarea name="comment" rows='6' placeholder="Write something..." required></textarea>
                </div></p>
            </div>
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="submit" id="submit" class="btn btn-large btn-primary input-large"/>Submit</button>
                </div>	
            </div>
        </section>
    </form>
    <section class="row">
        <section class='span6'>
            <?php foreach($commentList as $comment): ?>
                <?php echo $comment->username.' '.$comment->body.'<br />';
                echo strftime("%B %d %Y at %I:%M %p", strtotime($comment->created)).'<br><br>'; ?>
            <?php endforeach; ?>
        </section>
    </section>
</section>
<?php
}
?>