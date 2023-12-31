<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_Provided_controller extends CI_Controller {	

	 public function __construct() {
		parent::__construct();	
		$this->load->model('Service_model');	
		$this->load->model('Service_provided_model');	
		checkAuthentication();			
	 }	

	public function index(){
		$data['serviceList'] = $this->Service_provided_model->show();	
		echo json_encode($data);
	}

	public function store($maintenanceId) {
		$data['serviceList'] = $this->Service_model->show(array('status'=>'1'));			
		$data['maintenance_id'] = $maintenanceId;
			
		
		$this->form_validation->set_rules('quantity', 'Quantidade', 'numeric|required|min_length[1]|max_length[50]');		
				
		if($this->form_validation->run() == FALSE){								
			$this->load->view('templates/header.php');			
			$this->load->view('maintenance_add_service_provided_form.php',$data);
			$this->load->view('templates/footer.php');
		}else{
			$employeesId = $this->input->post('employeesId');
			$serviceId =  $this->input->post('serviceId');								
			$quantity = $this->input->post('quantity');
			
			try{			

				if(count($data['serviceList']) > 0){	
					$resultset= $this->Service_provided_model->show(array('services_id'=>$serviceId, 'employees_id'=>$employeesId, 'maintenance_id'=> $maintenanceId));
										
					if( count($resultset) == 1 ){
						$this->Service_provided_model->updateOnlyQuantity($serviceId , $employeesId, ($quantity + $resultset[0]['quantity']),  $maintenanceId);						
					}else{
  
						$this->Service_provided_model->insert($maintenanceId, $employeesId, $serviceId, $quantity);				
					} 				
					
					$this->session->set_flashdata('message', array('type'=>'success','content'=>'Adicionado com sucesso'));
				}else{
					$this->session->set_flashdata('message', array('type'=>'warning','content'=>'Não a serviços cadastrados.'));
				}
				

			}catch(Exception $e){
				$this->session->set_flashdata('message', array('type'=>'error','content'=>$e->getMessage()));
			}
			
			redirect('index.php/maintenance/workon/'. $maintenanceId);

		}
		
	}


	public function destroy($id, $maintenanceId) {
		$resultset = $this->Service_provided_model->show(array('id'=>$id));		

		if(count($resultset) == 1 && $this->Service_provided_model->delete($id)){			
			$this->session->set_flashdata('message', array('type'=>'success','content'=>'Registro deletado com sucesso'));						
		}else{
			$this->session->set_flashdata('message', array('type'=>'error','content'=>'Não foi possivel deletar seu registro'));				
		}

		redirect('index.php/maintenance/workon/'. $maintenanceId);
	}

}
