<h2 class="mt-4">Commentaires</h2>

<?php  
    if(count($comments) == 0){ ?>
        <p>Il n'y a pas encore de commentaires.</p>
    <?php } 
    else{
        foreach($comments as $comment){ ?>
            <div class="card mb-4">
                <div class="card-header">
                    <?php echo $comment->author . ', le ' . $comment->created_at ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $comment->content ?></p>
                </div>
            </div>
        <?php }  
    } ?>

