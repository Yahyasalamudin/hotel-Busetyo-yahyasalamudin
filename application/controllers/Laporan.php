<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
      public function laporan_pdf()
      {
            $this->load->library('pdf');

            $data['list'] = $this->m_general->gListPesanan('id_pesanan')->result();

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-petanikode.pdf";
            $this->pdf->load_view('laporan_pdf', $data);
      }
}
