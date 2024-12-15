<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\BadRequestError;

class Subscription extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
	}
	
	public function plans(){
		$this->title = "Plans";
		$data['get_plans'] = $this->root->get_record('tbl_subscriptions','','*','asc|id');
		$userID = $this->session->user_id;

		$where = "created_by = $userID AND payment_status = 'complete' AND plan_status = 'active'";
		$activePlan = $this->root->get_record('tbl_online_payments',$where,'*','asc|id');
		$data['plan_id'] = $activePlan[0]->plan_id ?? '';

        $this->load->view('subscription/plans',$data);
	}

	public function add_plan(){

		if(!empty($_POST)):
			$required_fields = [
				'plan_type'      => $this->input->post('billing_cycle', true),
				'plan_price'     => $this->input->post('plan_price', true),
				'hosting_type'   => $this->input->post('hosting_type', true),
				'plan_name'      => $this->input->post('plan_name', true),
				'disk_space'     => $this->input->post('disk_space', true),
				// 'bandwidth'      => $this->input->post('bandwidth', true),
				// 'email_accounts' => $this->input->post('email_accounts', true),
			];
			
			// Check if any required field is empty
			foreach ($required_fields as $field => $value) {
				if (empty($value)) {
					echo json_encode([
						'status' => 'error',
						'message' => "The field '{$field}' is required."
					]);
					return; // Stop further execution
				}
			}

			$features = $this->input->post('features', true);
			$feature_details = $this->input->post('feature_details', true);

			$feature_pairs = [];
			if (is_array($features) && is_array($feature_details)) {
				foreach ($features as $index => $feature) {
					if (isset($feature_details[$index])) {
						$feature_pairs[$feature] = $feature_details[$index];
					}
				}
			}

			$encoded_features = json_encode($feature_pairs);

			// Billing cycle Data
			$items = $this->input->post('billing_cycle1', true);
			$item_details = $this->input->post('price', true);

			$pairs = [];
			if (is_array($items) && is_array($item_details)) {
				foreach ($items as $index => $item) {
					if (isset($item_details[$index])) {
						$pairs[$item . '_month'] = $item_details[$index];
					}
				}
			}

			$data = [
				'type'           => $this->input->post('billing_cycle', true),
				'plan_price'     => $this->input->post('plan_price', true),
				'hosting_type'   => $this->input->post('hosting_type', true),
				'plan_name'      => $this->input->post('plan_name', true),
				'disk_space'     => $this->input->post('disk_space', true),
				// 'bandwidth'      => $this->input->post('bandwidth', true),
				// 'email_accounts' => $this->input->post('email_accounts', true),
				'key_features'   => $encoded_features,
				'pricing_table' => json_encode($pairs)
			];
			// pre($data);

			if ($this->root->insert_record('tbl_subscriptions', $data)) {
				echo json_encode([
					'status' => 'success',
					'message' => 'Plan added successfully!',
					'data' => $data
				]);
			} else {
				echo json_encode([
					'status' => 'error',
					'message' => 'Failed to add plan. Please try again later.'
				]);
			}
			die;

		endif;
		
		$this->load->view('subscription/add-plan');
	}

	public function edit_plan($plan_id) {
		$plan = $this->root->get_record('tbl_subscriptions', ['id' => $plan_id]);
	
		if (!$plan) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Plan not found.'
			]);
			return;
		}
	
		if (!empty($_POST)) {
			$required_fields = [
				'billing_cycle'  => $this->input->post('billing_cycle', true),
				'plan_price'     => $this->input->post('plan_price', true),
				'hosting_type'   => $this->input->post('hosting_type', true),
				'plan_name'      => $this->input->post('plan_name', true),
				'disk_space'     => $this->input->post('disk_space', true),
				// 'bandwidth'      => $this->input->post('bandwidth', true),
				// 'email_accounts' => $this->input->post('email_accounts', true),
			];

			foreach ($required_fields as $field => $value) {
				if (empty($value)) {
					echo json_encode([
						'status' => 'error',
						'message' => "The field '{$field}' is required."
					]);
					return;
				}
			}
	
			$features = $this->input->post('features', true);
			$feature_details = $this->input->post('feature_details', true);
	
			$feature_pairs = [];
			if (is_array($features) && is_array($feature_details)) {
				foreach ($features as $index => $feature) {
					if (isset($feature_details[$index])) {
						$feature_pairs[$feature] = $feature_details[$index];
					}
				}
			}
	
			$encoded_features = json_encode($feature_pairs);

			// Billing Cycle Data
$items = $this->input->post('billing_cycle1', true);
$item_details = $this->input->post('price', true);

// Default structure
$default_pricing_tab = [
    "1_month" => "",
    "3_month" => "",
    "6_month" => "",
    "12_month" => "",
    "24_month" => "",
    "36_month" => ""
];

// Initialize pairs array
$pairs = [];

// Populate pairs with submitted data
if (is_array($items) && is_array($item_details)) {
    foreach ($items as $index => $item) {
        if (isset($item_details[$index])) {
            // Avoid double '_month'
            $key = (strpos($item, '_month') === false) ? $item . '_month' : $item;
            $pairs[$key] = $item_details[$index];
        }
    }
}

// Merge pairs with the default structure to retain missing durations
$pricing_data_to_save = array_merge($default_pricing_tab, $pairs);

// Convert to JSON for saving
$pricing_table_json = json_encode($pricing_data_to_save);
// pre($pricing_table_json);
	
			$data = [
				'type'           => $this->input->post('billing_cycle', true),
				'plan_price'     => $this->input->post('plan_price', true),
				'hosting_type'   => $this->input->post('hosting_type', true),
				'plan_name'      => $this->input->post('plan_name', true),
				'disk_space'     => $this->input->post('disk_space', true),
				'key_features'   => $encoded_features,
				'pricing_table' => ($pricing_table_json)
			];
	
			if ($this->root->update_record('tbl_subscriptions', $data, $plan_id)) {
				echo json_encode([
					'status' => 'success',
					'message' => 'Plan updated successfully!',
					'data' => $data
				]);
			} else {
				echo json_encode([
					'status' => 'error',
					'message' => 'Failed to update plan. Please try again later.'
				]);
			}
			return;
		}
	
		$this->load->view('subscription/edit-plan', ['plan' => $plan]);
	}

	/**
	 * @void return
	 */
	public function add_configurations(){
	
		if(!empty($_POST)):
			$plan_id = $this->input->post('plan_id');
			if(empty($plan_id)):
				echo json_encode([
					'status' => 'error',
					'message' => "Please select a plan."
				]);
				return;
			else:

			$items = $this->input->post('billing_cycle', true);
			$item_details = $this->input->post('price', true);

			$pairs = [];
			if (is_array($items) && is_array($item_details)) {
				foreach ($items as $index => $item) {
					if (isset($item_details[$index])) {
						$pairs[$item . '_month'] = $item_details[$index];
					}
				}
			}



				$data = [
						'plan_id' => $plan_id,
						'pricing_table' => json_encode($pairs)
				];
				$this->root->insert_record('tbl_plan_configuratins',$data);
				echo json_encode([
					'status' => 'success',
					'message' => 'Plan updated successfully!',
					'data' => $data
				]);
				return;
			endif;
		endif;	

	}

	public function delete_plan(){

		if($this->root->delete_record('tbl_subscriptions',$this->input->post('id'))):
			$response = array(
				'message' => 'donor deleted successfully.',
				'icon'    => 'success',
				'status'  => '200'
			);
		else:
			$response = array(
				'message' => 'Technical issue!',
				'icon'    => 'error',
				'status'  => '404'
			);
		endif;

		echo json_encode($response);
	}
	

	public function payment_history(){

		$this->title = "Payment History";
        get_limit_message();
        $config['base_url']    = site_url("subscription/payment-history");
		$config['total_rows']  = $this->subscription->get_payment_history_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
        $config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_invoices'] = $this->subscription->get_payment_history($config['per_page'],$page);
        $this->load->view('subscription/payment-history',$data);
	}

	public function payment_receipt($id){

		$data['get_invoice_data'] = $this->subscription->get_payment_invoice($id);
        $this->load->view('subscription/invoice',$data);
		
	}

	public function get_plan_details($id){
		$this->title = "Plan Details";
		$userID = $this->session->user_id;

		$data['get_plan_details'] = $this->root->get_record('tbl_subscriptions',"id = $id",'*','asc|id');
		

		$where = "created_by = $userID AND payment_status = 'complete' AND plan_status = 'active'";
		$activePlan = $this->root->get_record('tbl_online_payments',$where,'*','asc|id');

		if(isset($activePlan[0]->plan_id)){
			$data['has_plan'] = 'yes';
		}else{
			$data['has_plan'] = 'no';
		}

        $this->load->view('subscription/plan_details',$data);
	}

	public function check_plan_price(){
		$api_key = RAZORPAY_KEY;
		$api_secret = RAZORPAY_SECRET;

		require_once(APPPATH.'/third_party/razorpay/vendor/autoload.php');

		$api = new Api($api_key, $api_secret);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {


			$json_data = file_get_contents('php://input');
			$data = json_decode($json_data);
			
			$PlanID = $data->plan_id;

			$getPrice = $this->root->get_record('tbl_subscriptions',"id = $PlanID");


			$planPRICE = $getPrice[0]->plan_price;
			$planName = $getPrice[0]->plan_name;


			$paymentAmount = (int) ($planPRICE * 100);

			// Create Razorpay order
			$razorpayOrder = $api->order->create([
				'receipt' => 'order_rcptid_' . time(),
				'amount' => $paymentAmount,
				'currency' => 'INR',
				'payment_capture' => 1 // Auto capture payment
			]);

			$razorpayOrderId = $razorpayOrder['id'];

			try {

			
				// Prepare the response to send back to the client
				$response = [
					'status'            => 'success',
					'plan_key'          => $PlanID,
					'plan_name'         => $planName,
					'message'           => "Order created successfully",
					'razorpay_order_id' => $razorpayOrderId,
					'amount'            => $paymentAmount
				];
				
				$capture_OrderData = [
					'created_by'     => $this->session->user_id,
					'order_id'       => $razorpayOrderId,
					'amount'         => $planPRICE,
					'currency'       => 'INR',
					'payment_status' => 'pending',
					'plan_id'        => $PlanID,
					'created_at'     => date('Y-m-d H:i:s'),
				];
				
				$this->root->insert_record('tbl_online_payments',$capture_OrderData);

				echo json_encode($response);
				exit;
			} catch (BadRequestError $e) {
				// Handle errors appropriately
				// logError($e);

				$errorResponse = [
					'status' => 'error',
					'message' => 'Error creating order'
				];

				echo json_encode($errorResponse);
				exit;
			}
		}
	}

	public function update_order_id(){
		
		$json_data = file_get_contents('php://input');
		$data = json_decode($json_data);
		$userID = $this->session->user_id;
		
		if(!empty($data->razorpay_payment_id)){
			$razorpay_order_id   = $data->razorpay_order_id;
			$razorpay_payment_id = $data->razorpay_payment_id;
	
			$updateInfo = array(
				'payment_id'     => $razorpay_payment_id,
				'created_at'     => date('Y-m-d H:i:s'),
				'payment_status' => 'complete',
				'plan_status'    => 'active',
				'start_date'     => date('Y-m-d H:i:s'),
				'expiry_date'    => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +29 days')),
			);


			$userProfileUpdate = array(
				'start_date'     => date('Y-m-d H:i:s'),
				'expiry_date'    => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +29 days')),
			);
			$this->root->update('tbl_users',$userProfileUpdate,"id = $userID");
	
			$getDataofPlan       = $this->root->update('tbl_online_payments',$updateInfo,"order_id = '$razorpay_order_id' AND created_by = $userID");
			if($getDataofPlan){
				$Response = [
					'status' => 'success',
					'message' => 'Plan has been successfully upgraded'
				];
				echo json_encode($Response);
				exit;
			}
		}	
	}

	public function configurations(){
		$this->title = 'Configurations';
		$data['get_plans'] = $this->root->get_record('tbl_subscriptions');
		$this->load->view('subscription/add-configurations',$data);
	}
}