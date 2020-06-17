<h1>Commentaires en attente d'approbation</h1>



<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Auteur</th>
            <th scope="col">Page</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Posté le</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $comment){ ?>
            <tr>
                <td></td>
                <td><?php echo $comment->author ?></td>
                <td><?php echo $comment->page_title ?></td>
                <td><?php echo $comment->content ?></td>
                <td><?php echo $comment->created_at ?></td>
                <td>
                  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">approuver</button> -->
                  <a class="btn btn-primary" href="<?php echo base_url('admin/approve-pending/' . $comment->id) ?>" data-confirm="Etes-vous certain de vouloir supprimer?">Oui</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

