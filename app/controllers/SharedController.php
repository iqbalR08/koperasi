<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * pengguna_user_role_id_option_list Model Action
     * @return array
     */
	function pengguna_user_role_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT role_id AS value, role_name AS label FROM roles";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * pengguna_username_value_exist Model Action
     * @return array
     */
	function pengguna_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("pengguna");
		return $exist;
	}

	/**
     * pengguna_email_value_exist Model Action
     * @return array
     */
	function pengguna_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("pengguna");
		return $exist;
	}

	/**
     * role_permissions_role_id_option_list Model Action
     * @return array
     */
	function role_permissions_role_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT role_name AS value , role_id AS label FROM roles ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_pengguna Model Action
     * @return Value
     */
	function getcount_pengguna(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pengguna";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_jumlahadmin Model Action
     * @return Value
     */
	function getcount_jumlahadmin(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pengguna WHERE user_role_id=1";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_jumlahuser Model Action
     * @return Value
     */
	function getcount_jumlahuser(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pengguna WHERE user_role_id=2";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}



	/**
	* barchart_datapengguna Model Action
	* @return array
	*/
	function barchart_datapengguna(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array("Admin", "User"),
			"datasets"=> array(),
		);
		
		$sqltext = "SELECT COUNT(*) AS num FROM pengguna WHERE user_role_id=1";
    $queryparams = null;
    $jumlah_admin = $db->rawQueryValue($sqltext, $queryparams);
    $jumlah_admin = is_array($jumlah_admin) ? $jumlah_admin[0] : $jumlah_admin;
    
    // Ambil data jumlah user
    $sqltext = "SELECT COUNT(*) AS num FROM pengguna WHERE user_role_id=2";
    $queryparams = null;
    $jumlah_user = $db->rawQueryValue($sqltext, $queryparams);
    $jumlah_user = is_array($jumlah_user) ? $jumlah_user[0] : $jumlah_user;
    
    // Set data untuk dataset
    $chart_data["datasets"][] = array(
        "label" => "Pengguna",
        "backgroundColor" => array('rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'),
        "borderColor" => array('rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'),
        "borderWidth" => 2,
        "data" => array($jumlah_admin, $jumlah_user)
    );

    return $chart_data;
}

	/**
	* barchart_datapendapatan Model Action
	* @return array
	*/
	function barchart_datapendapatan(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(sm.No_Agenda) AS count_of_No_Agenda, sm.Tanggal_surat, sm.nama, sm.alamat, sm.pendapatan, sm.file_surat FROM pendapatan1 AS sm";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_No_Agenda');
		$dataset_labels =  array_column($dataset1, 'count_of_No_Agenda');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* barchart_datasuratkeluar Model Action
	* @return array
	*/
	function barchart_datasuratkeluar(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(sk.No_Agenda) AS count_of_No_Agenda, sk.tanggal_surat, sk.asal_surat, sk.Nomor_surat, sk.perihal, sk.file_surat FROM surat_keluar AS sk";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_No_Agenda');
		$dataset_labels =  array_column($dataset1, 'count_of_No_Agenda');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}


	/**
	* COBA-COBA GRAFIK
	**/

	public function getLineChartData($tahun = null) {
        // Koneksi database
        $db = $this->GetModel();
        
        // Gunakan tahun saat ini jika tidak ada tahun yang diberikan
        if (is_null($tahun)) {
            $tahun = date('Y');
        }
        
        // Ambil data dari database
        $query = "SELECT alamat, MONTHNAME(tanggal_surat) as bulan, SUM(tanggal_surat) as total_populasi
                  FROM pendapatan1 
                  WHERE YEAR(tanggal_surat) = ?
                  GROUP BY alamat, MONTH(tanggal_surat)
                  ORDER BY MONTH(tanggal_surat)";
        
        // Jalankan kueri dengan parameter tahun
        $result = $db->rawQuery($query, [$tahun]);

        // Format data untuk Chart.js
        $labels = array();
        $datasets = array();
        $data_by_alamat = array();

        // Inisialisasi data untuk setiap desa
        foreach ($result as $row) {
            $alamat = $row['alamat'];
            $bulan = $row['bulan'];
            $total_populasi = $row['total_populasi'];

            if (!isset($data_by_alamat[$alamat])) {
                $data_by_alamat[$alamat] = array_fill(0, 12, 0); // Inisialisasi array untuk 12 bulan
            }

            // Konversi nama bulan ke indeks (0-11)
            $monthIndex = date('n', strtotime($bulan)) - 1;
            $data_by_alamat[$alamat][$monthIndex] = $total_populasi;

            if (!in_array($bulan, $labels)) {
                $labels[] = $bulan;
            }
        }

        foreach ($data_by_alamat as $alamat => $data) {
            $datasets[] = array(
                'label' => $alamat,
                'data' => $data,
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                'borderWidth' => 1
            );
        }

        return array(
            'labels' => $labels,
            'data' => $data
        );
    }
}
