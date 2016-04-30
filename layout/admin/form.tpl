<form <?= $this->getFormData()?>>
    <?php foreach($this->getFields() as $field):?>
        <div class="input-field <?= $field['class']?>">
            <?php if($field['prefix']):?>
            <i class="material-icons prefix"><?= $field['prefix']?></i>
            <?php endif;?>
            <?= $this->getInput($field);?>
            <label for="<?= $field['id']?>"><?= $field['label']?></label>
        </div>
    <?php endforeach;?>
        <div class="input-field <?= $this->getButton('class')?>">
            <br>
            <button class="btn waves-effect waves-light <?= $this->getButton('class')?>" type="submit" name="action"><?= $this->getButton('text')?>
                <i class="material-icons right">send</i>
            </button>
        </div>
</form>
