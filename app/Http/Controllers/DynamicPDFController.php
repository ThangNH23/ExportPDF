<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
        $customer_data = $this->get_customer_data(); // gọi phương thức get_customer_data() để lấy dữ liệu khách hàng từ csdl và gán kết quả vào biến $customer_data
        return view('dynamic_pdf')->with('customer_data', $customer_data);
    }
    
    function get_customer_data()
    {
        $customer_data = DB::table('user')->get();

        return $customer_data;
    }
    function pdf()
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
        $customer_data = $this->get_customer_data();
        $output = '
        <h3 align="center">Customer Data</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
            <th style="border: 1px solid; padding:12px;" width="20%">id</th>
            <th style="border: 1px solid; padding:12px;" width="30%">first_name</th>
            <th style="border: 1px solid; padding:12px;" width="15%">last_name</th>
            <th style="border: 1px solid; padding:12px;" width="15%">email</th>
            <th style="border: 1px solid; padding:12px;" width="20%">joining_date</th>
        </tr>
     ';
        foreach ($customer_data as $customer => $value) {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">' . $value->id . '</td>
       <td style="border: 1px solid; padding:12px;">' . $value->first_name . '</td>
       <td style="border: 1px solid; padding:12px;">' . $value->last_name . '</td>
       <td style="border: 1px solid; padding:12px;">' . $value->email . '</td>
       <td style="border: 1px solid; padding:12px;">' . $value->joining_date . '</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }
}
