<?php 
/**
 * pendapatan Page Controller
 * @category  Controller
 */
class pendapatanController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "pendapatan1";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("No_Agenda", 
			"Tanggal_surat",  
			"nama", 
			"populasi", 
			"alamat",
			"induk_kering1",
			"induk_kering2",
			"induk_laktasi1",
			"induk_laktasi2",
			"dara1",
			"dara2",
			"pedet_jtn",
			"pedet_btn",
			"pendapatan", 
			"file_surat");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
			pendapatan1.No_Agenda LIKE ? OR 
			pendapatan1.Tanggal_surat LIKE ? OR 
			pendapatan1.nama LIKE ? OR
			pendapatan1.populasi LIKE ? OR
			pendapatan1.alamat LIKE ? OR 
			pendapatan1.induk_kering1 LIKE ? OR 
			pendapatan1.induk_kering2 LIKE ? OR 
			pendapatan1.induk_laktasi1 LIKE ? OR 
			pendapatan1.induk_laktasi2 LIKE ? OR 
			pendapatan1.dara1 LIKE ? OR 
			pendapatan1.dara2 LIKE ? OR 
			pendapatan1.pedet_jtn LIKE ? OR 
			pendapatan1.pedet_btn LIKE ? OR 
			pendapatan1.pendapatan LIKE ? OR 
			pendapatan1.file_surat LIKE ?
		)";
		$search_params = array(
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		);
			//setting search conditions
		$db->where($search_condition, $search_params);
			 //template to use when ajax search
		$this->view->search_template = "pendapatan1/search.php";
	}
	if(!empty($request->orderby)){
		$orderby = $request->orderby;
		$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
		$db->orderBy($orderby, $ordertype);
	}
	else{
		$db->orderBy("pendapatan1.No_Agenda", ORDER_TYPE);
	}
	if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Pendapatan1";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("pendapatan1/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("No_Agenda", 
			"Tanggal_surat", 
			"nama", 
			"populasi", 
			"alamat", 
			"induk_kering1",
			"induk_kering2",
			"induk_laktasi1",
			"induk_laktasi2",
			"dara1",
			"dara2",
			"pedet_jtn",
			"pedet_btn",
			"pendapatan",
			"file_surat");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("pendapatan1.No_Agenda", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Surat Masuk";
			$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
			$this->view->report_title = $page_title;
			$this->view->report_layout = "report_layout.php";
			$this->view->report_paper_size = "A4";
			$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("pendapatan1/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("Tanggal_surat","nama","populasi","alamat","induk_kering1","induk_kering2","induk_laktasi1","induk_laktasi2","dara1","dara2","pedet_jtn","pedet_btn","pendapatan","file_surat");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Tanggal_surat' => 'required',
				'nama' => 'required',
				'populasi' => 'required',
				'alamat' => 'required',
				'induk_kering1' => 'required',
				'induk_kering2' => 'required',
				'induk_laktasi1' => 'required',
				'induk_laktasi2' => 'required',
				'dara1' => 'required',
				'dara2' => 'required',
				'pedet_jtn' => 'required',
				'pedet_btn' => 'required',
				'pendapatan' => 'required',
				'file_surat' => 'required',
			);
			$this->sanitize_array = array(
				'Tanggal_surat' => 'sanitize_string',
				'nama' => 'sanitize_string',
				'populasi' => 'sanitize_string',
				'alamat' => 'sanitize_string',
				'induk_kering1' => 'sanitize_string',
				'induk_kering2' => 'sanitize_string',
				'induk_laktasi1' => 'sanitize_string',
				'induk_laktasi2' => 'sanitize_string',
				'dara1' => 'sanitize_string',
				'dara2' => 'sanitize_string',
				'pedet_jtn' => 'sanitize_string',
				'pedet_btn' => 'sanitize_string',
				'pendapatan' => 'sanitize_string',
				'file_surat' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("pendapatan1");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Pendapatan";
		$this->render_view("pendapatan1/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("No_Agenda","Tanggal_surat","nama","populasi","alamat","induk_kering1","induk_kering2","induk_laktasi1","induk_laktasi2","dara1","dara2","pedet_jtn","pedet_btn","pendapatan","file_surat");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Tanggal_surat' => 'required',
				'nama' => 'required',
				'populasi' => 'required',
				'alamat' => 'required',
				'induk_kering1' => 'required',
				'induk_kering2' => 'required',
				'induk_laktasi1' => 'required',
				'induk_laktasi2' => 'required',
				'dara1' => 'required',
				'dara2' => 'required',
				'pedet_jtn' => 'required',
				'pedet_btn' => 'required',
				'pendapatan' => 'required',
				'file_surat' => 'required',
			);
			$this->sanitize_array = array(
				'Tanggal_surat' => 'sanitize_string',
				'nama' => 'sanitize_string',
				'populasi' => 'sanitize_string',
				'alamat' => 'sanitize_string',
				'induk_kering1' => 'sanitize_string',
				'induk_kering2' => 'sanitize_string',
				'induk_laktasi1' => 'sanitize_string',
				'induk_laktasi2' => 'sanitize_string',
				'dara1' => 'sanitize_string',
				'dara2' => 'sanitize_string',
				'pedet_jtn' => 'sanitize_string',
				'pedet_btn' => 'sanitize_string',
				'pendapatan' => 'sanitize_string',
				'file_surat' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("pendapatan1.No_Agenda", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("pendapatan1");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("pendapatan1");
					}
				}
			}
		}
		$db->where("pendapatan1.No_Agenda", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Surat Masuk";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("pendapatan1/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("No_Agenda","Tanggal_surat","nama","populasi","alamat","induk_kering1","induk_kering2","induk_laktasi1","induk_laktasi2","dara1","dara2","pedet_jtn","pedet_btn","pendapatan","file_surat");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'Tanggal_surat' => 'required',
				'nama' => 'required',
				'populasi' => 'required',
				'alamat' => 'required',
				'induk_kering1' => 'required',
				'induk_kering2' => 'required',
				'induk_laktasi1' => 'required',
				'induk_laktasi2' => 'required',
				'dara1' => 'required',
				'dara2' => 'required',
				'pedet_jtn' => 'required',
				'pedet_btn' => 'required',
				'pendapatan' => 'required',
				'file_surat' => 'required',
				'disposisi' => 'required',
			);
			$this->sanitize_array = array(
				'Tanggal_surat' => 'sanitize_string',
				'nama' => 'sanitize_string',
				'populasi' => 'sanitize_string',
				'alamat' => 'sanitize_string',
				'induk_kering1' => 'sanitize_string',
				'induk_kering2' => 'sanitize_string',
				'induk_laktasi1' => 'sanitize_string',
				'induk_laktasi2' => 'sanitize_string',
				'dara1' => 'sanitize_string',
				'dara2' => 'sanitize_string',
				'pedet_jtn' => 'sanitize_string',
				'pedet_btn' => 'sanitize_string',
				'pendapatan' => 'sanitize_string',
				'file_surat' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("pendapatan1.No_Agenda", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("pendapatan1.No_Agenda", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("pendapatan1");
	}
}
