     
      <?php  
         //Starting the session
         session_start();   
         $sessionId = session_id();
         print("Session Id: ".$sessionId).'<br>';

         if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 10)) {
            if($sessionId){
                $update = App\Models\Admin\Theorycentre::where('id',Session::get('theorycentre_id'))->update(['status' => 1]);

                // last request was more than 30 minutes ago
                session_unset();     // unset $_SESSION variable for the run-time 
                session_destroy();   // destroy session data in storage
                echo 'Restore';
            } 
        }else{
            echo 'Restore'.$_SESSION['LAST_ACTIVITY'] = time();// update last activity time stamp
        } 
      ?>