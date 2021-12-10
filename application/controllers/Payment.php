<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'third_party/razorpay/Razorpay.php');
use Razorpay\Api\Api;
class Payment extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("payment_model");
	}
	
	public function index()
	{
		$cid = 1;
		$this->session->set_userdata('cid', $cid);
		$customerdata['customer_data'] = $this->payment_model->fetchCustometdata($this->session->userdata('cid'));
		$this->load->view('payment-view',$customerdata);
	}

	public function checkout()
	{
		$this->form_validation->set_rules('price', 'Price', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', "Price field Required");
			redirect('/');
		} else {
			$key = API_KEY;
			$secret = API_SECRET;
			$api = new Api($key,$secret);
			$price = $this->input->post('price');
		
			$order_id = rand(111,999);
			
			$order = $api->order->create([
				'receipt' => 'order_rcpt_id_'.$order_id, 
				'amount' => $price * 100, 
				'currency' => 'INR'
			]);
	
			$pay_data= array();
			
			$pay_data['razorpay_order_id'] = $order['id'];
			$pay_data['user_id'] = $this->session->userdata('cid');
			$pay_data['amount'] = $price;
			$pay_data['payment_status'] = $order['status'];
			$pay_data['currency'] = $order['currency'];
			$pay_data['checkout_order_id'] = $order['receipt'];
	
			if($this->db->insert('payment_transaction', $pay_data)){
				$customerdata= $this->payment_model->fetchCustometdata($this->session->userdata('cid'));
	
				$this->load->view('razorpay-checkout',['customerdata' => $customerdata,'order'=>$order,'key'=>$key,'secret'=>$secret]);
			}else {
				echo "error";
				die();
			}
		}
	}

	public function paymentstatus()
	{
		if(isset($_POST['razorpay_order_id']) && isset($_POST['razorpay_payment_id'])){
			$data = array();
			$secret = API_SECRET;
			$df = $_POST['razorpay_order_id'] . "|" . $_POST['razorpay_payment_id'];
			$generated_signature = hash_hmac("sha256",$df, $secret);
	
			if ($generated_signature == $_POST['razorpay_signature']) {
				$data['razorpay_payment_id'] = isset($_POST['razorpay_payment_id']) ? $_POST['razorpay_payment_id'] : null;
				$data['razorpay_order_id'] = isset($_POST['razorpay_order_id']) ? $_POST['razorpay_order_id'] : null;
				$data['razorpay_signature'] = isset($_POST['razorpay_signature']) ? $_POST['razorpay_signature'] : null;  
				$data['payment_status'] = 'success'; 
				
				$payment_exist = $this->db->query("SELECT id FROM payment_transaction WHERE user_id = '".$this->session->userdata('cid')."' AND razorpay_order_id = '".$_POST['razorpay_order_id']."' ")->row_array();
	
				if($payment_exist){
					$data['updated_date'] = date('Y-m-d');
					$this->db->update('payment_transaction', $data, ['id' => $payment_exist['id']]);
					$data['id'] = $payment_exist['id'];
				} 
				$this->load->view('razorpay-success',$data);
			}else {
				$this->load->view('razorpay-failed');
			}
		} else {
			$this->session->set_flashdata('error', "Not Authorised");
			return redirect(base_url());
		}
	}

	public function myorders()
	{
		$data['orders'] = $this->payment_model->getallordersbycustomerid($this->session->userdata('cid'));

		if(count($data) > 0){
			$this->load->view('my-orders', $data);
		} else {
			$this->session->set_flashdata('error', "No Data Found");
			return redirect(base_url());
		}

	}
}
