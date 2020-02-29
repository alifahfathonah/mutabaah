<?php 
if (!$this->session->userdata('ses_mentoring')){
    redirect(base_url());
}
?>
<!DOCTYPE html>
<html>
<?php $this->load->view('mtr_mutabaah/templates/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
        <?php $this->load->view('mtr_mutabaah/templates/header.php');?>
        <?php $this->load->view('mtr_mutabaah/templates/sidebar.php'); ?>
        <?php $this->load->view('mtr_mutabaah/pages/'.$page.'.php',$content); ?>  
    </div>
    <?php $this->load->view('mtr_mutabaah/templates/script.php'); ?>  

    
</body>
</html>

