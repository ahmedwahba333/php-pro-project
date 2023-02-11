<?php 

// namespace table_handelar;

interface DB{
    
    public function set_table($table);
    public function  select_records();
     public function Uploads_files($save);
      public function download_files($id);
    

}

 interface valdet{
    public function default_namecard();
    public function default_email();
    public function default_password();
    public function default_confpassword();
    public function default_cardNumber();
    public function default_cvv();
    public function default_exdate();
    public function card();
}


// interface up {

// }
