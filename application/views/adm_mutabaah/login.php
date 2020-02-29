<!DOCTYPE html>
<html>
<?php $this->load->view('adm_mutabaah/templates/head.php'); ?>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">BAI</h1>
            </div>
            <h3>Mutabaah - BAI</h3>
            <?php echo form_open_multipart('Admin' , array('class' => 'm-t', 'role' => 'form')); ?>
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" required="" autocomplete="hilab-admin-password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <p class="m-t"> <small>BAI Matholi'ul Anwar &copy; 2018</small> </p>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/ass_admin/templates/'); ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url('assets/ass_admin/templates/'); ?>js/bootstrap.min.js"></script>
</body>
</html>