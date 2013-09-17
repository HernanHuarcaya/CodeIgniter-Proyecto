
        <div class="container">
            
            <?php $atributos = array('class' => 'form-signin', 'id' => 'frmLogin'); ?>
            <?php echo form_open('../verifica_login', $atributos); ?>
            <img src="images/banner.gif">
            <div class="controles">
            <label for="username">Usuario:</label>
            <input type="text" size="20" maxlength="20" id="username" name="username" class="input-block-level" placeholder="Login"/>
            <div class="MiError"><?php echo form_error('username'); ?></div>
            
            <label for="password">Password:</label>
            <input type="password" size="20" maxlength="20" id="password" name="password" class="input-block-level" placeholder="Password"/>
            <div class="MiError"><?php echo form_error('password'); ?></div>
            
            <input type="submit" value="Login" class="btn btn-primary" />
            <?php // echo validation_errors(); ?>
            </div>
            </form>
        </div>


