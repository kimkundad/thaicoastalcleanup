<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_m extends CI_Model {
// Constructor.
	public function __construct() {
        parent::__construct();
    }
// End Constructor.




// Public function.
///////////////////////////////////////////////// Oveview report
    public function GetOverviewReportData($strDateStart=null, $strDateEnd=null, $provinceCode=null, $amphurCode=null) {
		$sqlStrWhere = $this->CreateSqlWhere($strDateStart, $strDateEnd, $provinceCode, $amphurCode);

		$result["marineDebrisTableRpt"] = $this->GetMarineDebrisTableRptData($sqlStrWhere);
		$result["marineDebrisChartRpt"] = $this->GetMarineDebrisChartRptData($sqlStrWhere);

		return $result;
	}
	private function GetMarineDebrisTableRptData($sqlStrWhere) {
		$this->load->model('dataclass/iccCard_d');
		$this->load->model('dataclass/garbageTransaction_d');
		$this->load->model('dataclass/garbage_d');
		$this->load->model('dataclass/province_d');

		// Create sql string.
		$sqlStr = "SELECT p." . $this->province_d->colProvinceCode
				. ", p." . $this->province_d->colProvinceName
				. ", g." . $this->garbage_d->colName
				. ", SUM(gt." . $this->garbageTransaction_d->colGarbageQty . ") AS sumQty"

				. " FROM " . $this->garbageTransaction_d->tableName . " AS gt"

				. " LEFT JOIN " . $this->garbage_d->tableName . " AS g"
				. " ON gt." . $this->garbageTransaction_d->colFkGarbage
				. "=g." . $this->garbage_d->colId

				. " LEFT JOIN " . $this->iccCard_d->tableName . " AS c"
				. " ON gt." . $this->garbageTransaction_d->colFkIccCard
				. "=c." . $this->iccCard_d->colId

				. " LEFT JOIN " . $this->province_d->tableName . " AS p"
				. " ON c." . $this->iccCard_d->colFkProvinceCode
				. "=p." . $this->province_d->colProvinceCode

				. $sqlStrWhere
				. " AND gt." . $this->garbageTransaction_d->colActive . "=1"

				. " GROUP BY p." . $this->province_d->colProvinceCode
				. ", gt." . $this->garbageTransaction_d->colFkGarbage

				. " ORDER BY p." . $this->province_d->colProvinceName . ", sumQty desc";

		// Execute sql.
		$this->load->model('db_m');
		$result = $this->db_m->GetRow($sqlStr);

		return $result;
	}
	private function GetMarineDebrisChartRptData($sqlStrWhere) {
		$this->load->model('dataclass/iccCard_d');
		$this->load->model('dataclass/garbageTransaction_d');
		$this->load->model('dataclass/garbage_d');

		// Create sql string.
		$sqlStr = "SELECT g." . $this->garbage_d->colName . " AS label"
				. ", SUM(gt." . $this->garbageTransaction_d->colGarbageQty . ") AS value"

				. " FROM " . $this->garbageTransaction_d->tableName . " AS gt"

				. " LEFT JOIN " . $this->garbage_d->tableName . " AS g"
				. " ON gt." . $this->garbageTransaction_d->colFkGarbage
				. "=g." . $this->garbage_d->colId

				. " LEFT JOIN " . $this->iccCard_d->tableName . " AS c"
				. " ON gt." . $this->garbageTransaction_d->colFkIccCard
				. "=c." . $this->iccCard_d->colId
				
				. $sqlStrWhere
				. " AND gt." . $this->garbageTransaction_d->colActive . "=1"

				. " GROUP BY gt." . $this->garbageTransaction_d->colFkGarbage
				
				. " ORDER BY value desc"
				. " LIMIT 10";

		// Execute sql.
		$this->load->model('db_m');
		$result = $this->db_m->GetRow($sqlStr);

		return $result;
	}
///////////////////////////////////////////////// End Oveview report

///////////////////////////////////////////////// Tool
    // ----------------------------------------------------- Get For Combobox ------------------------------------
	public function GetDataForComboBox($fkProvinceCode=null) {
		$result['dsProvince'] = $this->GetDsProvince();
		$result['dsAmphur'] = $this->GetDsAmphur($fkProvinceCode);
		$result['check_url'] = "report";
		return $result;
	}
///////////////////////////////////////////////// End Tool

///////////////////////////////////////////////// Detail report
    public function GetDetailReportData($strDateStart=null, $strDateEnd=null, $provinceCode=null, $amphurCode=null) {
		$sqlStrWhere = $this->CreateSqlWhere($strDateStart, $strDateEnd, $provinceCode, $amphurCode);

		$result["detailEventChartRpt"] = $this->GetDetailEventChartRptData($sqlStrWhere);
		$result["detailTableRpt"] = $this->GetDetailTableRptData($sqlStrWhere);
		
		return $result;
	}
	private function GetDetailTableRptData($sqlStrWhere) {
		$this->load->model('dataclass/iccCard_d');
		$this->load->model('dataclass/garbageTransaction_d');
		$this->load->model('dataclass/garbage_d');
		$this->load->model('dataclass/province_d');

		// Create sql string.
		$sqlStr = "SELECT c." . $this->iccCard_d->colProjectName
				. ", g." . $this->garbage_d->colName
				. ", SUM(gt." . $this->garbageTransaction_d->colGarbageQty . ") AS sumQty"

				. " FROM " . $this->garbageTransaction_d->tableName . " AS gt"

				. " LEFT JOIN " . $this->garbage_d->tableName . " AS g"
				. " ON gt." . $this->garbageTransaction_d->colFkGarbage
				. "=g." . $this->garbage_d->colId

				. " LEFT JOIN " . $this->iccCard_d->tableName . " AS c"
				. " ON gt." . $this->garbageTransaction_d->colFkIccCard
				. "=c." . $this->iccCard_d->colId

				. $sqlStrWhere
				. " AND gt." . $this->garbageTransaction_d->colActive . "=1"

				. " GROUP BY c." . $this->iccCard_d->colId
				. ", gt." . $this->garbageTransaction_d->colFkGarbage

				. " ORDER BY c." . $this->iccCard_d->colProjectName . ", sumQty desc";

		// Execute sql.
		$this->load->model('db_m');
		$result = $this->db_m->GetRow($sqlStr);

		return $result;
	}
	private function GetDetailEventChartRptData($sqlStrWhere) {
		$this->load->model('dataclass/iccCard_d');
		$this->load->model('dataclass/garbageTransaction_d');
		$this->load->model('dataclass/garbage_d');
		$this->load->model('dataclass/province_d');

		// Create sql string.
		$sqlStr = "SELECT p." . $this->province_d->colProvinceCode
				. ", p." . $this->province_d->colProvinceName
				. ", g." . $this->garbage_d->colName
				. ", SUM(gt." . $this->garbageTransaction_d->colGarbageQty . ") AS sumQty"

				. " FROM " . $this->garbageTransaction_d->tableName . " AS gt"

				. " LEFT JOIN " . $this->garbage_d->tableName . " AS g"
				. " ON gt." . $this->garbageTransaction_d->colFkGarbage
				. "=g." . $this->garbage_d->colId

				. " LEFT JOIN " . $this->iccCard_d->tableName . " AS c"
				. " ON gt." . $this->garbageTransaction_d->colFkIccCard
				. "=c." . $this->iccCard_d->colId

				. " LEFT JOIN " . $this->province_d->tableName . " AS p"
				. " ON c." . $this->iccCard_d->colFkProvinceCode
				. "=p." . $this->province_d->colProvinceCode

				. $sqlStrWhere
				. " AND gt." . $this->garbageTransaction_d->colActive . "=1"

				. " GROUP BY p." . $this->province_d->colProvinceCode
				. ", gt." . $this->garbageTransaction_d->colFkGarbage

				. " ORDER BY p." . $this->province_d->colProvinceName . ", sumQty desc";

		// Execute sql.
		$this->load->model('db_m');
		$result = $this->db_m->GetRow($sqlStr);

		return $result;
	}
	public function GetDetailTopTenChartRptData($strDateStart=null, $strDateEnd=null, $provinceCode=null, $amphurCode=null) {
		$sqlStrWhere = $this->CreateSqlWhere($strDateStart, $strDateEnd, $provinceCode, $amphurCode);
		$result = GetMarineDebrisChartRptData($sqlStrWhere);

		return $result;
	}
///////////////////////////////////////////////// End Detail report
// End Public function.





// Private function.
    // ---------------------------------------------------- Get DB to combobox -----------------------------------
	// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ Amphur Table ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	// This public method.
    public function GetDsAmphur($fkProvinceCode=null) {
		$this->load->model("dataclass/amphur_d");
		$this->load->model("db_m");

		$this->db_m->tableName = $this->amphur_d->tableName;
		$this->db_m->sequenceColumn = $this->amphur_d->colAmphurName;
		$this->db_m->colId = $this->amphur_d->colProvinceCode;
		$fkProvinceCode = ( ($fkProvinceCode < 1) ? null : $fkProvinceCode);

		$dataSet = $this->db_m->GetRowById($fkProvinceCode, null);
    
    	return $dataSet;
    }
	// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ Province Table ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    private function GetDsProvince($id=null) {
		$this->load->model("dataclass/province_d");
		$this->load->model("db_m");

		$this->db_m->tableName = $this->province_d->tableName;
		$this->db_m->sequenceColumn = $this->province_d->colProvinceName;
		$dataSet = $this->db_m->GetRowById(null, null);
    
    	return $dataSet;
    }


	// ---------------------------------------------------------- Tools ------------------------------------------
	private function CreateSqlWhere($strDateStart=null, $strDateEnd=null
								, $provinceCode=null, $amphurCode=null) {
		$this->load->model('dataclass/iccCard_d');
		$this->load->model('dataclass/garbageTransaction_d');
		$this->load->model('dataclass/garbage_d');

		// Create sql string where.
		$sqlWhere = " WHERE c." . $this->iccCard_d->colActive . "=1"
			. (($provinceCode!==NULL) ? " AND c." . $this->iccCard_d->colFkProvinceCode . "=" . $provinceCode : NULL )
			. (($amphurCode!==NULL) ? " AND c." . $this->iccCard_d->colFkAmphurCode . "=" . $amphurCode : NULL )
			. " AND c." . $this->iccCard_d->colEventDate
			. " BETWEEN '" . $strDateStart . "%' AND '" . $strDateEnd . "%'";

		return $sqlWhere;
	}
// End Private function.
}