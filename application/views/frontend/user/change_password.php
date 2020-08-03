<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <div class="card hoverable" style="padding: 20px;">
            <b><?php echo validation_errors(); ?></b>
            <form action="<?= base_url('user/change_password'); ?>" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="new_password" name="new_password" type="password" class="validate">
                        <label for="new_password">New Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="confirm_password" name="confirm_password" type="password" class="validate">
                        <label for="confirm_password">Konfirm Password</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="submit" onclick="return confirm('Ubah Password!')">Ubah Password
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>