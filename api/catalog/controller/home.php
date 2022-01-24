<?php 
	class HomeController extends Controller {
	    public function index() {
	    	echo "test";
	    }
	    public function getToken(){
	    	$data = array();
	    	$input = array(
	    		'func' => 'checkTicket',
	    		'username' => '',
	    		'password' => ''
	    	);
	    	$result = array(
	    		'result' => 'success',
	    		'desc'	=> 'get token',
	    		'code'	=> 200,
	    		'token' => encrypt(md5('token'))
	    	);
	    	$this->json($result);
	    }
	    public function getTicket(){
	    	$data = array();
	    	$input = array(
	    		'ticket_id' => '1',
	    		'token'	=>	'aVF1c3dLMGdxaVhEMUpCdHludVltcUVndHVrOWd5K2VocWppR0NEb2NFT1hlcEZxWktwVDdxMUlDKzFnR3NMZw=='
	    	);
	    	$result_ticket = $this->model('master')->getTicket($input);
	    	$result = array(
	    		'result' => 'success',
	    		'desc'	=> 'get ticket',
	    		'code'	=> 200,
	    		'detail' => $result_ticket
	    	);
	    	$this->json($result);
	    }
	    public function getTickets(){
	    	$data = array();
	    	// $user_id = 
	    	$input = array(
	    		'token'	=>	'aVF1c3dLMGdxaVhEMUpCdHludVltcUVndHVrOWd5K2VocWppR0NEb2NFT1hlcEZxWktwVDdxMUlDKzFnR3NMZw=='
	    	);

	    	$result_ticket = $this->model('master')->getTickets($input);
	    	$result = array(
	    		'result' => 'success',
	    		'desc'	=> 'get tickets',
	    		'code'	=> 200,
	    		'detail' => $result_ticket
	    	);
	    	$this->json($result);
	    }
	}
?>