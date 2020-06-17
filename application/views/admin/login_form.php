<h1>Connexion admin</h1>

<?php if(!is_null($this->session->flashdata('errors'))){ ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('errors'); ?>
    </div>
<?php } ?>

<?php echo form_open('admin/login'); ?>
    <div class="form-group">
        <label for="pass-input">Veuillez entrer le mot de passe</label>
        <input type="password" name="pass" class="form-control" id="pass-input">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>