<?php 
	class ContrabController extends Controller {
		public function backupDB() {
			$file_name = date('Y-m-d H:i:s');
			exec('mysqldump --user='.DB_USER.' --password='.DB_PASS.' --host='.DB_HOST.' '.DB_DB.' > '.$file_name.'.sql');
		}
		public function passthru() {
			$DBUSER=DB_USER;
			$DBPASSWD=DB_PASS;
			$DATABASE=DB_DB;
			$file_name = date('Y-m-d H:i:s');
			$nameOutput = "backup-" . $file_name . ".sql.gz";
			$mime = "application/x-gzip";

			header( "Content-Type: " . $mime );
			header( 'Content-Disposition: attachment; filename="' . $nameOutput . '"' );

			$cmd = "mysqldump -u $DBUSER --password=$DBPASSWD $DATABASE | gzip --best";   

			passthru( $cmd );

			exit(0);
		}
		public function backup(){
			// $dbhost = 'localhost:3306';
			// $dbuser = DB_USER;
			// $dbpass = DB_PASS;
		   
			// $backup_file = DB_DB . date("Y-m-d-H-i-s") . '.gz';
			// $command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ". DB_DB." | gzip > $backup_file";
		   
		 //   system($command);
		}
		public function recovery(){
			$dbhost = 'localhost:3036';
			$dbuser = 'root';
			$dbpass = 'rootpassword';
			
			$conn = mysql_connect($dbhost, $dbuser, $dbpass);
			
			if(! $conn ) {
			   die('Could not connect: ' . mysql_error());
			}
			
			$table_name = "employee";
			$backup_file  = "/tmp/employee.sql";
			$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
			
			mysql_select_db('test_db');
			$retval = mysql_query( $sql, $conn );
			
			if(! $retval ) {
			   die('Could not take data backup: ' . mysql_error());
			}
			
			echo "Backedup  data successfully\n";
			
			mysql_close($conn);
		}
	}
?>