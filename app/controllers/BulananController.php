<?php
class BulananController extends SecureController {

    public function __construct() {
        parent::__construct();
        $this->tablename = "pendapatan1"; 
    }

    public function index() {
        $db = $this->GetModel(); 
        $tablename = $this->tablename; 

        $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : null;
        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : null;

        $where = "";
        if (!empty($bulan) && !empty($tahun)) {
            $where = "MONTH(Tanggal_surat) = {$bulan} AND YEAR(Tanggal_surat) = {$tahun}";
        } elseif (!empty($bulan)) {
            $where = "MONTH(Tanggal_surat) = {$bulan}";
        } elseif (!empty($tahun)) {
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
            "SUM(pendapatan) AS total_pendapatan", 
            "COUNT(*) AS total_records",
            "(SUM(induk_kering1) + SUM(induk_kering2) + SUM(induk_laktasi1) + SUM(induk_laktasi2) + SUM(dara1) + SUM(dara2) + SUM(pedet_jtn) + SUM(pedet_btn)) AS total_populasi"
        ];

        $pagination = $this->get_pagination(MAX_RECORD_COUNT);

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

        $page_title = $this->view->page_title = "Bulanan";
        $this->view->report_filename = date('Y-m-d') . '-' . $page_title;
        $this->view->report_title = $page_title;
        $this->view->report_layout = "report_layout.php";
        $this->view->report_paper_size = "A4";
        $this->view->report_orientation = "portrait";

        $this->render_view("bulanan/list.php", $data);
    }

}
?>
