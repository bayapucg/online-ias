<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_contactus($data){
		$this->db->insert('contactus', $data);
		return $insert_id = $this->db->insert_id();
	}
	public  function get_banners_list(){
		$this->db->select('b_id,b_img,b_org_img,status')->from('banners');
		$this->db->where('place','Home');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public  function get_our_associate_hospital(){
		$this->db->select('h.h_id,h.name,,h.logo')->from('hospital as h');
		$this->db->where('h.status',1);
		return $this->db->get()->result_array();
	}
	public function get_specification_list(){
		$this->db->select('sp.s_id,sp.name,sp.text,sp.icon,sp.image')->from('doctors as d');
		$this->db->join('specialty as sp','sp.s_id=d.speciality','left');
		$this->db->where('d.status',1);
		$this->db->group_by('sp.s_id');
		return $this->db->get()->result_array();
	}
	
	/* speciality wise doctor */
	
	public  function get_specialities_name($id){
		$this->db->select('name,s_id')->from('specialty');
		$this->db->where('s_id',$id);
		$this->db->where('status',1);
		return $this->db->get()->row_array();
	}
	public  function get_specialities_doctores($sp_id,$city){
		$this->db->select('d.d_id,d.name,d.email,d.mobile,d.experience,h.name as hos_name,dep.name as department,d.course,s.name as specialization,d.c_fee,d.mor_f_t,d.mor_t_t,d.aft_f_t,d.aft_t_t,d.profile_pic')->from('doctors as d');
		$this->db->join('hospital as h','h.h_id=d.h_id','left');
		$this->db->join('specialty as s','s.s_id=d.speciality','left');
		$this->db->join('department as dep','dep.d_id=d.department','left');
		$this->db->where('d.speciality',$sp_id);
		if($city!=''){
		 $this->db->where('h.city',$city);
		}
		$this->db->where('d.status',1);
		return $this->db->get()->result_array();
	}
	public  function get_our_hospital(){
		$this->db->select('h.h_id,h.name,hi.img_name')->from('hospital as h');
		$this->db->join('hospital_imgs as hi','hi.h_id=h.h_id','left');
		$this->db->join('doctors as d','d.h_id=h.h_id','left');
		//$this->db->where('h.city',$city);
		$this->db->where('h.status',1);
		$this->db->where('h.homepage_status',1);
		$this->db->order_by('hi.h_img_d','asc');
		$this->db->group_by('h.h_id');
		$return=$this->db->get()->result_array();
		foreach($return as $rli){
			$hos_d=$this->het_hosiptal_doct_cnt($rli['h_id']);
			$hos_dept=$this->het_hosiptal_departt_cnt($rli['h_id']);
			//echo $this->db->last_query();
			//echo '<pre>';print_r($hos_dept);
			if($hos_d['cnt']>0){
				$data[$rli['h_id']]=$rli;
				$data[$rli['h_id']]['hos_doc']=isset($hos_d['cnt'])?$hos_d['cnt']:'0';
				$data[$rli['h_id']]['hosl_depart']=isset($hos_dept['cnt'])?$hos_dept['cnt']:'0';
			}
		}
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_search_our_hospital($city,$search){
		$this->db->select('h.h_id,h.name,hi.img_name')->from('hospital as h');
		$this->db->join('hospital_imgs as hi','hi.h_id=h.h_id','left');
		$this->db->join('doctors as d','d.h_id=h.h_id','left');
		$this->db->where('h.city',$city);
		$this->db->like('h.name', $search);
		$this->db->where('h.status',1);
		$this->db->where('h.homepage_status',1);
		$this->db->order_by('hi.h_img_d','asc');
		$this->db->group_by('h.h_id');
		$return=$this->db->get()->result_array();
		foreach($return as $rli){
			$hos_d=$this->het_hosiptal_doct_cnt($rli['h_id']);
			$hos_dept=$this->het_hosiptal_departt_cnt($rli['h_id']);
			if($hos_d['cnt']>0){
				$data[$rli['h_id']]=$rli;
				$data[$rli['h_id']]['hos_doc']=isset($hos_d['cnt'])?$hos_d['cnt']:'0';
				$data[$rli['h_id']]['hosl_depart']=isset($hos_dept['cnt'])?$hos_dept['cnt']:'0';
			}
		}
		if(!empty($data)){
			return $data;
		}
	}
	public function het_hosiptal_doct_cnt($hid){
		$this->db->select('COUNT(d.d_id) as cnt')->from('doctors as d');
		$this->db->where('d.h_id',$hid);
		$this->db->where('d.status',1);
		return $this->db->get()->row_array();
	}
	public function het_hosiptal_departt_cnt($hid){
		$this->db->select('COUNT(d.department) as cnt')->from('doctors as d');
		$this->db->where('d.h_id',$hid);
		//$this->db->group_by('d.department');
		$this->db->where('d.status',1);
		return $this->db->get()->row_array();
	}
	
	/* hospital details page */
	public  function get_hospital_details($hid){
		$this->db->select('h.h_id,h.name,h.email,h.contact_num,h.phone_num,h.emergency_contact,h.city,h.branchs,h.address,h.logo,h.lat,h.lng')->from('hospital as h');
		$this->db->where('h_id',$hid);
		return $this->db->get()->row_array();
	}
	public  function get_hospital_docts($hid){
		$this->db->select('d.d_id,d.name,d.email,d.mobile,d.experience,dep.name as department,d.course,s.name as specialization,d.c_fee,d.mor_f_t,d.mor_t_t,d.aft_f_t,d.aft_t_t,d.profile_pic')->from('doctors as d');
		$this->db->join('hospital as h','h.h_id=d.h_id','left');
		$this->db->join('specialty as s','s.s_id=d.speciality','left');
		$this->db->join('department as dep','dep.d_id=d.department','left');
		$this->db->where('d.h_id',$hid);
		$this->db->where('d.status',1);
		return $this->db->get()->result_array();
	}
	public  function get_hospital_departments($id){
		$this->db->select('COUNT(d_id) as cnt')->from('doctors');	
		$this->db->where('h_id',$id);
		//$this->db->group_by('department');
        return $this->db->get()->row_array();
	}
	public function get_hospital_images($hid){
		$this->db->select('hi.img_name,hi.org_img_name')->from('hospital_imgs as hi');
		$this->db->where('hi.h_id',$hid);
		return $this->db->get()->result_array();
	}
	public function get_doctor_details($id){
		$this->db->select('d.d_id,d.h_id,d.name,d.experience,dep.name as department,d.course,s.name as specialization,d.no_of_p_p_h,d.c_fee,d.mor_f_t,d.mor_t_t,d.aft_f_t,d.aft_t_t,d.profile_pic,h.name as hospitalname,h.address as hospitaladdress')->from('doctors as d');
		$this->db->join('hospital as h','h.h_id=d.h_id','left');
		$this->db->join('specialty as s','s.s_id=d.speciality','left');
		$this->db->join('department as dep','dep.d_id=d.department','left');		
		$this->db->where('d.d_id',$id);
        return $this->db->get()->row_array();
	}
	/* hospital details page */
	/* slot booking */
	public function get_doctor_booked_appoint($did,$date){
		$this->db->select('ab.time')->from('appointments_booking as ab');
		$this->db->where('ab.d_id',$did);
		$this->db->where('ab.a_date',$date);
		$this->db->where('ab.status',1);
        return $this->db->get()->result_array();
	}
	public function check_doctor_leaves($did,$date){
		$newDate = date("m/d/Y", strtotime($date));
		$this->db->select('ls.l_id,ls.d_id,ls.date,ls.slot,ls.status')->from('leaves as ls');
		$this->db->where('ls.d_id',$did);
		$this->db->where('ls.date',$newDate);
		$this->db->where('ls.status',1);
        return $this->db->get()->row_array();
	}
	
	/* slot booking */
	/* doctor list */

	/* doctor list */
	
	public  function get_new_patient_list($id){
		$this->db->select('fm.f_m_id,fm.name')->from('family_member as fm');
		$this->db->where('fm.user_id',$id);
		$this->db->where('fm.status',1);
        return $this->db->get()->result_array();
	}
	public  function save_new_patient($ad){
		$this->db->insert('family_member',$ad);
		return $this->db->insert_id();
	}
	public  function check_new_patient($id,$name,$email,$mobile){
		$this->db->select('fm.f_m_id,fm.name')->from('family_member as fm');
		$this->db->where('fm.user_id',$id);
		$this->db->where('fm.name',$name);
		$this->db->where('fm.email',$email);
		$this->db->where('fm.mobile',$mobile);
		$this->db->where('fm.status',1);
        return $this->db->get()->row_array();
	}
	public  function get_hospital_couponcode($d_id){
		$this->db->select('d.d_id,of.c_type,of.amt')->from('doctors as d');
		$this->db->join('hospital as h','h.h_id=d.h_id','left');
		$this->db->join('offers as of','of.h_id=h.h_id','left');
        return $this->db->get()->row_array();
	}
	
	public function get_newpatent_details($id){
		$this->db->select('fm.f_m_id,fm.name,fm.mobile,fm.email,fm.age,fm.gender')->from('family_member as fm');
		$this->db->where('fm.f_m_id',$id);
        return $this->db->get()->row_array();
	}
	
	/* save appoinment */
	public  function save_appoinment($d){
		$this->db->insert('appointments_booking',$d);
		return $this->db->insert_id();
	}
	
	public  function get_appoinment_details($id){
		$this->db->select('a.name,a.mobile,a.profile_pic,ab.name as pname')->from('executive_assign_hospital as eah');
		$this->db->join('appointments_booking as ab','ab.h_id=eah.h_id','left');
		$this->db->join('admin as a','a.a_id=eah.a_id','left');
		$this->db->where('ab.a_b_id',$id);
		$this->db->where('eah.status',1);
		return $this->db->get()->row_array();
	}
	
	/* home  page offers */
	
	public  function get_offer_hospital_details($cid){
		$this->db->select('c.c_id,c.doc_id,c.date,c.discount,c.h_id,c.note,c.des,c.h_id,h.name,h.email,h.contact_num,h.phone_num,h.emergency_contact,h.city,h.branchs,h.address,h.logo,h.lat,h.lng')->from('campaign as c');
		$this->db->join('hospital as h','h.h_id=c.h_id','left');
		$this->db->where('c.c_id',$cid);
		return $this->db->get()->row_array();
	}
	public  function get_offers_doctor_details($id){
		$this->db->select('d.d_id,d.name,d.experience,dep.name as department,d.course,s.name as specialization,c.no_of_pat_per_h,d.profile_pic,c.m_in_t,c.m_out_t,c.eve_in_t,c.eve_out_t')->from('campaign as c');
		$this->db->join('doctors as d','d.d_id=c.doc_id','left');
		$this->db->join('hospital as h','h.h_id=d.h_id','left');
		$this->db->join('specialty as s','s.s_id=d.speciality','left');
		$this->db->join('department as dep','dep.d_id=d.department','left');		
		$this->db->where('c.doc_id',$id);
        return $this->db->get()->row_array();
	}
	
	public  function get_testimonials_list(){
		$this->db->select('t.name,t.message,t.image')->from('testimonials as t');
		$this->db->where('t.status',1);
        return $this->db->get()->result_array();
	}
	
	public  function get_hospital_search_list($search){
		$this->db->select('h.h_id as id,h.name as name')->from('hospital as h');
		$this->db->like('h.name',$search);
		$this->db->where('h.status',1);
		$this->db->limit(10);
		$return=$this->db->get()->result_array();
		foreach($return as $li){
			$data[$li['id']]=$li;
			$data[$li['id']]['type']=1;			
		}
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_doctor_search_list($search){
		$this->db->select('d.d_id as id,d.name as name')->from('doctors as d');
		$this->db->like('d.name',$search);
		$this->db->where('d.status',1);
		$this->db->limit(10);
		$return=$this->db->get()->result_array();
		foreach($return as $li){
			$data[$li['id']]=$li;
			$data[$li['id']]['type']=0;
			
		}
		if(!empty($data)){
			return $data;
		}
	}
	
	public function get_cam_test_details($c_id){
		$this->db->select('ct.t_name,ct.t_amt')->from('campaign_test as ct');
		$this->db->where('ct.c_id',$c_id);
		$this->db->where('ct.status',1);
        return $this->db->get()->result_array();
	}
	
	// campagin
	public  function get_cam_details($cid){
		$this->db->select('c.c_id,c.no_of_pat_per_h,c.h_id,c.date,c.discount,c.doc_id,c.m_in_t,c.m_out_t,c.eve_in_t,c.eve_out_t,c.no_of_pat_per_h,d.d_id,d.name,d.experience,dep.name as department,d.course,s.name as specialization,d.profile_pic')->from('campaign as c');
		$this->db->join('doctors as d','d.d_id=c.doc_id','left');
		$this->db->join('department as dep','dep.d_id=d.department','left');
		$this->db->join('specialty as s','s.s_id=d.speciality','left');		
		$this->db->where('c.c_id',$cid);
		$this->db->where('c.status',1);
        return $this->db->get()->row_array();
	}
	
	public  function get_termsandconditions(){
		$this->db->select('t.termsandconditions,t.privacypolicy')->from('termsandconditions as t');
		$this->db->where('t.t_id',1);
        return $this->db->get()->row_array();
	}
	
	
	public  function check_book_time_already_exits($did,$date,$time){
		$this->db->select('ab.a_b_id')->from('appointments_booking as ab');
		$this->db->where('ab.d_id',$did);
		$this->db->where('ab.a_date',$date);
		$this->db->where('ab.time',$time);
		$this->db->where('ab.status',1);
		return $this->db->get()->row_array();
	}
	
	public  function check_slot_booking($uid,$did){
		$this->db->select('ab.a_b_id')->from('appointments_booking as ab');
		$this->db->where('ab.d_id',$did);
		$this->db->where('ab.created_by',$uid);
		$this->db->where('ab.follow_up_time >',date('Y-m-d H:i:s'));
		$this->db->where('ab.fellowup_days >',0);
		$this->db->where('ab.status',3);
		return $this->db->get()->row_array();
	}
	
	/* token list */
	public  function get_token_users_list(){
		$this->db->select('u.user_id,u.token')->from('users as u');
		$this->db->where('u.status',1);
		$this->db->where('u.token is NOT NULL', NULL, FALSE);
		return $this->db->get()->result_array();
	}
	
	 public  function get_new_product_names_inbetween($intime,$outtime){
			$sql = "SELECT n_id,title,message FROM notifications WHERE   created_at BETWEEN '".$outtime."' AND '".$intime."'";
			return $this->db->query($sql)->row_array();
	  }
	  
	  /* appointment booking */
	  public  function get_appointment_appoinment_details($id){
		$this->db->select('a.mobile as emobile,h.phone_num,h.name as hname')->from('executive_assign_hospital as eah');
		$this->db->join('appointments_booking as ab','ab.h_id=eah.h_id','left');
		$this->db->join('hospital as h','h.h_id=ab.h_id','left');
		$this->db->join('admin as a','a.a_id=eah.a_id','left');
		$this->db->where('ab.a_b_id',$id);
		$this->db->where('eah.status',1);
		return $this->db->get()->row_array();
	}
	public  function get_appointment_patient_details($apid){
		$this->db->select('*')->from('appointments_booking as ab');
		$this->db->where('ab.a_b_id',$apid);
		return $this->db->get()->row_array();
	}
	public  function check_followup_time($did,$uid,$date){
		$this->db->select('ab.a_b_id,ab.follow_up_time')->from('appointments_booking as ab');
		$this->db->where('ab.d_id',$did);
		$this->db->where('ab.created_by',$uid);
		$this->db->where('ab.follow_up_time >',$date);
		$this->db->where('ab.fellowup_days >',0);
		$this->db->where('ab.status',3);
		return $this->db->get()->row_array();
	}
	
	public  function get_doct_dep($did){
		$this->db->select('d.d_id,d.h_id,d.name,dep.name as department')->from('doctors as d');
		$this->db->join('hospital as h','h.h_id=d.h_id','left');
		$this->db->join('specialty as s','s.s_id=d.speciality','left');
		$this->db->join('department as dep','dep.d_id=d.department','left');		
		$this->db->where('d.d_id',$did);
        return $this->db->get()->row_array();
	}
	public  function get_hospital_name_details($apid){
		$this->db->select('h.name')->from('appointments_booking as ab');
		$this->db->join('hospital as h','h.h_id=ab.h_id','left');
		$this->db->where('ab.a_b_id',$apid);
		return $this->db->get()->row_array();
	}
	
	
	
	
}