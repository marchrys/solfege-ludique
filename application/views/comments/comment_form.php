<h2>Laisser un commentaire</h2>

<?php if(!is_null($this->session->flashdata('errors'))){ ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('errors'); ?>
    </div>
<?php } ?>

<?php if(!is_null($this->session->flashdata('success'))){ ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php } ?>

<?php echo form_open('comments'); ?>
    <input type="hidden" id="pageId" name="pageId" value="<?php echo $pageId ?>">
    <div class="form-group">
        <label for="nameText">Votre nom</label>
        <input type="text" name="name" class="form-control" id="nameText" value="<?php if($this->session->flashdata('name')) echo set_value('name', $this->session->flashdata('name')); ?>">
    </div>
    <div class="form-group">
        <label for="commentTextarea">Votre commentaire</label>
        <textarea name="comment" class="form-control" id="commentTextarea" rows="3"><?php echo $this->session->flashdata('comment'); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-4">Envoyer</button>
</form>
