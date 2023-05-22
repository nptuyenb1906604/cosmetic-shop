<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use App\City;
use App\Province;
use App\Ward;
use App\FeeShip;


class DeliveryController extends Controller
{
    public function delivery(Request $request){
    	$city = City::orderby('matp', 'ASC')->get();
    	
    	return view('admin.add_delivery')->with(compact('city'));
    }

    public function select_delivery(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action'] == "city"){
    			$select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    			$output.='<option>--Chọn quận huyện--</option>';
    			foreach($select_province as $key => $value){
    				$output.='<option value="'.$value->maqh.'">'.$value->name_qh.'</option>';
    			}
    		}else{
    			$select_ward = Ward::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
    			$output.='<option>--Chọn xã phường--</option>';
    			foreach($select_ward as $key => $value){
    				$output.='<option value="'.$value->xaid.'">'.$value->name_xp.'</option>';
    			}
    		}
    	}
    	echo $output;
    }

    public function insert_delivery(Request $request){
    	$data = $request->all();
    	$fee_ship = new FeeShip;
    	$fee_ship->fee_matp = $data['city'];
    	$fee_ship->fee_maqh = $data['province'];
    	$fee_ship->fee_xaid = $data['ward'];
    	$fee_ship->fee_feeship = $data['fee_ship'];
    	$fee_ship->save();

    }

    public function select_feeship(Request $request){
        $feeship = Feeship::orderby('fee_id', 'DESC')->get();
        $output = '';
        $output .= '
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Tỉnh thành phố</th>
                            <th>Quận huyện</th>
                            <th>Xã phường</th>
                            <th>Phí vận chuyển</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($feeship as $key => $value){
                        $output .= '
                        <tr>
                            <td>'.$value->city->name_tp.'</td>
                            <td>'.$value->province->name_qh.'</td>
                            <td>'.$value->ward->name_xp.'</td>
                            <td contenteditable data-feeship_id="'.$value->fee_id.'" class="fee_feeship_edit">'.number_format($value->fee_feeship,0,',','.').'</td>
                        </tr>';
                    }

                    $output .= '
                    </tbody>
                </table>
            </div>';

        echo $output;
    }

    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = FeeShip::find($data['feeship_id']);
        $fee = rtrim($data['feeship_value'],'.');
        $fee_ship->fee_feeship = $fee;
        $fee_ship->save();
    }
}
