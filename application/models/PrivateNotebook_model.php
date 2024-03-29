<?php

class PrivateNotebook_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_PrivateNotebookInput($privateNB_ID)
    {

        $this->db->where('privateNB_ID', $privateNB_ID);
        $this->db->select('pageInput, pageTheme, pageTimer');
        $query = $this->db->get("privatenb_pages");
        return $query;
    }

    public function updatePage($pageTimer, $pageTheme, $pageInput, $id)
    {

        $this->db->where('privateNB_ID', $id);
        $this->db->set('pageTimer', $pageTimer);
        $this->db->set('pageTheme', $pageTheme);
        $this->db->set('pageInput', $pageInput);

        $result = $this->db->update('privatenb_pages');

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getImage()
    {
        $id = $this->session->userdata('user_ID');
        $target_directory = APPPATH . '/uploads/privatenotebook/';
        $filename = $id . "_privateNotebookImage";
        $extension = ".jpg";
        $path_filename_ext = $target_directory . $filename . $extension;
        if (file_exists($path_filename_ext)) {
            $extension = ".jpg";
        } else {
            $extension = ".jpeg";
            $path_filename_ext = $target_directory . $filename . $extension;
            if (file_exists($path_filename_ext)) {

                $extension = ".jpeg";
            } else {
                $extension = ".png";
            }
        }
        $path_filename_ext = $target_directory . $filename . $extension;
        $file = $id . "_privateNotebookImage" . $extension;
        if (file_exists($path_filename_ext)) {
            return "/application/uploads/privatenotebook/$file";
        } else {
            return "No image";
        }
    }

    public function removeImage($id)
        {
            $filename = $id."_privateNotebookImage";
            $extension = ".jpg";
            $path_filename_ext = APPPATH.'/uploads/privatenotebook/'.$filename.$extension;

            if(file_exists($path_filename_ext))
            {
                $extension = ".jpg";
                unlink($path_filename_ext);
            }
            else
            {
                $extension = ".jpeg";
                $path_filename_ext = APPPATH.'/uploads/privatenotebook/'.$filename.$extension;
                if(file_exists($path_filename_ext))
                {
                            
                    $extension = ".jpeg";
                    unlink($path_filename_ext);
                }
                else
                {
                    $extension = ".png";
                    $path_filename_ext = APPPATH.'/uploads/privatenotebook/'.$filename.$extension;
                    
                    if(file_exists($path_filename_ext))
                    {
                        $extension = ".png";
                        unlink($path_filename_ext);
                        
                    }
                }
            }
        }

    public function resetPage()
    {
        date_default_timezone_set("Asia/Manila");
        $currentTime = date("H:i s");

        $start = "00:00:00";

        $this->db->where('pageTimer >=', $start);
        $this->db->where('pageTimer <=', $currentTime);
        $this->db->select('privateNB_ID');
        $query = $this->db->get("privatenb_pages");
        foreach ($query->result() as $row) 
        {   
            $id = $row->privateNB_ID;   
            $this->removeImage($id);
            echo $id;
        }

        $reset = "UPDATE privatenb_pages SET pageInput = 'This is my private page.', pageTheme = 'Light', pageTimer = '00:00:00' WHERE pageTimer BETWEEN '00:00:00' AND '$currentTime'";
        $this->db->query($reset);
        return;
    }
}
