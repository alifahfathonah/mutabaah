<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="<?php echo base_url('assets/ass_admin/templates/'); ?>img/profile_small.jpg" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Mentoring</strong>
                         </span> <span class="text-muted text-xs block">BAI UDINUS <b class="caret"></b></span> </span> </a>
                </div>
                <div class="logo-element">
                    BAI
                </div>
            </li>
            <li <?php echo ( $this->uri->segment(1) == 'AdmMutabaah_dashboard' ? 'class="active"': ''); ?>>
                <a href="<?php echo base_url('AdmMutabaah_dashboard'); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li <?php echo ( $this->uri->segment(1) == 'AdmMutabaah_mentoring' ? 'class="active"': ''); ?>>
                <a href="<?php echo base_url('AdmMutabaah_mentoring'); ?>"><i class="fa fa-group"></i> <span class="nav-label">Mentoring</a>
            </li>
            <li <?php echo ( $this->uri->segment(1) == 'AdmMutabaah_kelompok' ? 'class="active"': ''); ?>>
                <a href="<?php echo base_url('AdmMutabaah_kelompok'); ?>"><i class="fa fa-bank"></i> <span class="nav-label">Kelompok</a>
            </li>
            <li <?php echo ( $this->uri->segment(1) == 'AdmMutabaah_user' ? 'class="active"': ''); ?>>
                <a href="<?php echo base_url('AdmMutabaah_user'); ?>"><i class="fa fa-user"></i> <span class="nav-label">User</a>
            </li>
            
            <li <?php echo ( $this->uri->segment(1) == 'AdmMutabaah_absensi' ? 'class="active"': ''); ?>>
                <a href="<?php echo base_url('AdmMutabaah_absensi'); ?>"><i class="fa fa-user"></i> <span class="nav-label">Absensi</a>
            </li>
            <li <?php echo ( $this->uri->segment(1) == 'AdmMutabaah_mutabaah' ? 'class="active"': ''); ?>>
                <a href="<?php echo base_url('AdmMutabaah_mutabaah'); ?>"><i class="fa fa-sticky-note"></i> <span class="nav-label">Mutabaah</a>
            </li>
            <li <?php echo ( $this->uri->segment(1) == 'wkwkwwkkw' ? 'class="active"': ''); ?>>
                <a href="<?php echo base_url('wkwkwwkkw'); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">wkwkwkwk</a>
            </li>
        </ul>

    </div>
</nav>