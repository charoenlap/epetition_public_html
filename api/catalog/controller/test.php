<?php 
	class testController extends Controller {
		public function index(){
			$result = array();
			$str = post('base64');
			$arr = explode(';base64',$str);
			$type = explode('/',$arr[0]);
			convert_base64($str,'../uploads/files/test.'.$type[1]);
			$this->json($result);
		}
	}
	function convert_base64($base64_string, $output_file) {
	    $ifp = fopen( $output_file, 'wb' ); 

	    // split the string on commas
	    // $data[ 0 ] == "data:image/png;base64"
	    // $data[ 1 ] == <actual base64 string>
	    $data = explode( ',', $base64_string );
	    fwrite( $ifp, base64_decode( $data[ 1 ] ) );
	    fclose( $ifp ); 
	    return $output_file; 
	}
?>