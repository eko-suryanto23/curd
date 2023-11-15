<?php
class Matakuliah extends CI_Controller{
  public function index()
    { $data['matkul']=$this->M_matakuliah->tampilMatakuliah()->result();
        $this->load->view('view-form-matakuliah',$data);
    }
  public function cetak()
    {
      $this->form_validation->set_rules('kode', 'Kode Matakuliah', 'trim|required|min_length[3]',
      array('required' => '%s Wajib diisi',
           
            'min_length' => '%s 3 karakter.'));
      $this->form_validation->set_rules('nama', 'nama Matakuliah', 'required');
      array('required' => '%s Wajib diisi.');
      $this->form_validation->set_rules('sks', 'sks', 'required');
      if ($this->form_validation->run() == FALSE)
      {
              $this->load->view('view-form-matakuliah');
      }
      else
      {
        $data = [
          'kode' => $this->input->post('kode'),
          'nama' => $this->input->post('nama'),
          'sks' => $this->input->post('sks')
                  ];
  $this->M_matakuliah->simpanMatakuliah($data);
  redirect('Matakuliah');

}
} 
      }

