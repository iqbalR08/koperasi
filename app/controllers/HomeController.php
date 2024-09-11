<?php 

/**
 * Home Page Controller
 * @category  Controller
 */
class HomeController extends SecureController{
	
	public function __construct() {
		parent::__construct();
		$this->tablename = "pendapatan1"; 
	}

	public function index() {
		$db = $this->GetModel(); 
		$tablename = $this->tablename; 

		$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : null;

		$where = "";
		if (!empty($tahun)) {
			$where = "YEAR(Tanggal_surat) = {$tahun}";
		}

		$fields = [
			"No_Agenda", 
			"Tanggal_surat",  
			"nama",
			"populasi", 
			"alamat",
			"SUM(induk_kering1) AS total_induk_kering1",
			"SUM(induk_kering2) AS total_induk_kering2",
			"SUM(induk_laktasi1) AS total_induk_laktasi1",
			"SUM(induk_laktasi2) AS total_induk_laktasi2",
			"SUM(dara1) AS total_dara1",
			"SUM(dara2) AS total_dara2",
			"SUM(pedet_jtn) AS total_pedet_jtn",
			"SUM(pedet_btn) AS total_pedet_btn",
			"COUNT(*) AS total_records",
			"(SUM(induk_kering1) + SUM(induk_kering2) + SUM(induk_laktasi1) + SUM(induk_laktasi2) + SUM(dara1) + SUM(dara2) + SUM(pedet_jtn) + SUM(pedet_btn)) AS total_populasi",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 1 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS januari_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 2 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS februari_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 3 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS maret_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 4 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS april_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 5 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS mei_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 6 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS juni_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 7 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS juli_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 8 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS agustus_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 9 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS september_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 10 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS oktober_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 11 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS november_total",
			"SUM(CASE WHEN MONTH(Tanggal_surat) = 12 THEN (induk_kering1 + induk_kering2 + induk_laktasi1 + induk_laktasi2 + dara1 + dara2 + pedet_jtn + pedet_btn) ELSE 0 END) AS desember_total"
		];

		$sql = "SELECT " . implode(", ", $fields) . " FROM $tablename";
		if (!empty($where)) {
			$sql .= " WHERE $where";
		}
		$sql .= " GROUP BY alamat";
		$records = $db->query($sql);

		$data = new stdClass;
		$data->records = $records;

		if ($db->getLastError()) {
			$this->set_page_error();
		}

		$page_title = $this->view->page_title = "Tahunan";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";

		$this->render_view("home/index.php", $data); 
	}

}?>