<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_base extends CI_Migration {

	public function up() {

		## Create Table absensi
		$this->dbforge->add_field("`idAbsensi` int(11) NOT NULL auto_increment");
		$this->dbforge->add_key("idAbsensi",true);
		$this->dbforge->add_field("`waktu` datetime NULL ");
		$this->dbforge->add_field("`mentoring_idmentoring` int(11) NOT NULL ");
		$this->dbforge->add_key("mentoring_idmentoring",true);
		$this->dbforge->create_table("absensi", TRUE);
		$this->db->query('ALTER TABLE  `absensi` ENGINE = InnoDB');
		## Create Table kegiatan_mentoring
		$this->dbforge->add_field("`idkegiatan` int(11) NOT NULL auto_increment");
		$this->dbforge->add_key("idkegiatan",true);
		$this->dbforge->add_field("`materi` varchar(45) NULL ");
		$this->dbforge->add_field("`tilawah` varchar(45) NULL ");
		$this->dbforge->add_field("`mc` varchar(45) NULL ");
		$this->dbforge->add_field("`kultum` varchar(45) NULL ");
		$this->dbforge->add_field("`infaq` varchar(45) NULL ");
		$this->dbforge->add_field("`Absensi_idAbsensi` int(11) NOT NULL ");
		$this->dbforge->add_key("Absensi_idAbsensi",true);
		$this->dbforge->create_table("kegiatan_mentoring", TRUE);
		$this->db->query('ALTER TABLE  `kegiatan_mentoring` ENGINE = InnoDB');
		## Create Table kelompok
		$this->dbforge->add_field("`idKelompok` int(11) NOT NULL auto_increment");
		$this->dbforge->add_key("idKelompok",true);
		$this->dbforge->add_field("`jadwal` datetime NULL ");
		$this->dbforge->add_field("`kelompok_kode` varchar(45) NULL ");
		$this->dbforge->create_table("kelompok", TRUE);
		$this->db->query('ALTER TABLE  `kelompok` ENGINE = InnoDB');
		## Create Table mentoring
		$this->dbforge->add_field("`idmentoring` int(11) NOT NULL auto_increment");
		$this->dbforge->add_key("idmentoring",true);
		$this->dbforge->add_field("`role` varchar(45) NULL ");
		$this->dbforge->add_field("`Kelompok_idKelompok` int(11) NOT NULL ");
		$this->dbforge->add_key("Kelompok_idKelompok",true);
		$this->dbforge->add_field("`User_idUser` int(11) NOT NULL ");
		$this->dbforge->add_key("User_idUser",true);
		$this->dbforge->create_table("mentoring", TRUE);
		$this->db->query('ALTER TABLE  `mentoring` ENGINE = InnoDB');
		## Create Table mutabaah
		$this->dbforge->add_field("`idmutabaah` int(11) NOT NULL auto_increment");
		$this->dbforge->add_key("idmutabaah",true);
		$this->dbforge->add_field("`terlambat` varchar(45) NULL ");
		$this->dbforge->add_field("`tilawah` varchar(45) NULL ");
		$this->dbforge->add_field("`hafalan` varchar(45) NULL ");
		$this->dbforge->add_field("`puasa` varchar(45) NULL ");
		$this->dbforge->add_field("`qiamulail` varchar(45) NULL ");
		$this->dbforge->add_field("`baca_buku` varchar(45) NULL ");
		$this->dbforge->add_field("`memberi_hadiah` varchar(45) NULL ");
		$this->dbforge->add_field("`sodaqoh` varchar(45) NULL ");
		$this->dbforge->add_field("`update_berita_islam` varchar(45) NULL ");
		$this->dbforge->add_field("`update_berita_nasional` varchar(45) NULL ");
		$this->dbforge->add_field("`update_berita_internasional` varchar(45) NULL ");
		$this->dbforge->add_field("`olahraga` varchar(45) NULL ");
		$this->dbforge->add_field("`Absensi_idAbsensi` int(11) NOT NULL ");
		$this->dbforge->add_key("Absensi_idAbsensi",true);
		$this->dbforge->create_table("mutabaah", TRUE);
		$this->db->query('ALTER TABLE  `mutabaah` ENGINE = InnoDB');
		## Create Table user
		$this->dbforge->add_field("`idUser` int(11) NOT NULL auto_increment");
		$this->dbforge->add_key("idUser",true);
		$this->dbforge->add_field("`email` varchar(45) NULL ");
		$this->dbforge->add_field("`password` varchar(45) NULL ");
		$this->dbforge->create_table("user", TRUE);
		$this->db->query('ALTER TABLE  `user` ENGINE = InnoDB');
	 }

	public function down()	{
		### Drop table absensi ##
		$this->dbforge->drop_table("absensi", TRUE);
		### Drop table kegiatan_mentoring ##
		$this->dbforge->drop_table("kegiatan_mentoring", TRUE);
		### Drop table kelompok ##
		$this->dbforge->drop_table("kelompok", TRUE);
		### Drop table mentoring ##
		$this->dbforge->drop_table("mentoring", TRUE);
		### Drop table mutabaah ##
		$this->dbforge->drop_table("mutabaah", TRUE);
		### Drop table user ##
		$this->dbforge->drop_table("user", TRUE);

	}
}