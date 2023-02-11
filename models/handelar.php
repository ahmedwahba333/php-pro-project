<?php


// namespace table_handelar;


class handelar implements DB
{


    private $link;
    private $table;
    private $filename;
    public $destination;

    public $extension;

    public $file;
    public $size;
    // public $result;


    public function __construct($table)
    {
        $this->set_table($table);

        $this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function set_table($table)
    {

        $this->table = $table;
    }


    public function  select_records()
    {


        $query = "select * from " . $this->table;

        $files = mysqli_query($this->link, $query);



        return mysqli_fetch_all($files, MYSQLI_ASSOC);
    }


    public function  Uploads_files($save)
    {

        //    print_r($save);
        $this->filename = $save['myfile']['name'];
        $this->destination = '../uploads' . $this->filename;
        $this->extension = pathinfo($this->filename, PATHINFO_EXTENSION);
        $this->file = $_FILES['myfile']['tmp_name'];
        $this->size = $_FILES['myfile']['size'];
        //  echo($this->filename);

        if (!(empty($this->filename)) && move_uploaded_file($this->file, $this->destination)) {

            $sql = "INSERT INTO $this->table (name,  downloads) VALUES ('$this->filename', 0)";
            header('location:download.php');
            if (mysqli_query($this->link, $sql)) {
                echo "File uploaded successfully";
            }
        }
    }




    public function download_files($id)
    {

        if (!empty($_GET['file_id'])) {
            $id = $_GET['file_id'];
            $result = $this->select_records();

            foreach ($result as $res) {
                $file = $res;
            }

            $filepath = '../uploads' . $file['name'];


            

            if ($file['downloads'] != 7) {

                if (file_exists($filepath)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename=' . basename($filepath));
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize('uploads/' . $file['name']));
                    readfile('../uploads' . $file['name']);

                    // Now update downloads count




                    $newCount = $file['downloads'] + 1;


                    $updateQuery = "UPDATE product SET downloads=$newCount WHERE id=$id";


                    mysqli_query($this->link, $updateQuery);
                    exit();
                }
                
                header("refresh: 0");
                
            } else {
                header("location: home.php");
            }
        }
    }
}
