<!DOCTYPE html>
<html>
<?php $this->load->view('adm_mutabaah/templates/head.php'); ?>
<?php $this->load->view('adm_mutabaah/templates/script.php'); ?>
<body class="fixed-navigation"> 
    <div id="wrapper">
        <?php $this->load->view('adm_mutabaah/templates/sidenav.php'); ?>
        <div id="page-wrapper" class="gray-bg sidebar-content">
            <?php $this->load->view('adm_mutabaah/templates/topnav.php'); ?>
            <?php /* $this->load->view('adm_mutabaah/templates/sidepanel.php'); */ ?>
            <!-- <div class="wrapper wrapper-content"> -->
            <div class="wrapper-content">
                <?php $this->load->view('adm_mutabaah/pages/'.$page.'.php',$content); ?>        
            </div>
            <?php $this->load->view('adm_mutabaah/templates/footer.php'); ?>        
        </div>
    </div>
</body>
</html>
