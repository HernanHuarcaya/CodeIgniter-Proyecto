
        <div class="container">
            
            <?php $atributos = array('class' => 'form-signin', 'id' => 'frmLogin'); ?>
            <?php echo form_open('../verifica_login', $atributos); ?>
            <img src="images/banner.gif">
            <div class="controles">
            <label for="username">Usuario:</label>
            <input type="text" size="20" maxlength="20" id="txtuser" name="txtuser" class="input-block-level" placeholder="Login" required/>
            <!-- <div class="MiError"><?php //echo form_error('txtuser'); ?></div> -->
            
            <label for="password">Password:</label>
            <input type="password" size="20" maxlength="20" id="txtpass" name="txtpass" class="input-block-level" placeholder="Password" required/>
            <!-- <div class="MiError"><?php //echo form_error('password'); ?></div> -->
            
            <input type="submit" value="Login" class="btn btn-primary" />
            <div class="alert" style="display:<?=$Error?>">
                <?php  echo validation_errors(); ?>
            </div>
            </form>
        </div>


