
<div class="mt-2">
    <div class="col-sm-6">
        <?php echo $this->Flash->render('auth'); ?>
        <?php echo $this->Form->create('User'); ?>
            <div class="form-group">
                <fieldset>
                    <legend>
                        <?php echo __('Please enter your username and password'); ?>
                    </legend>
                    <?php echo $this->Form->input('username',array('class' => 'form-control'));
                    echo $this->Form->input('password',array('class' => 'form-control'));
                ?>
                </fieldset>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
