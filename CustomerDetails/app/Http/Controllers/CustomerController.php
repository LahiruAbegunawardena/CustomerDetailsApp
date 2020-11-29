<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller {
    protected $customerModel;
    public function __construct(Customer $customerModel) {
        $this->customerModel = $customerModel;
    }
    public function index() {
        $data["customers"] = $this->customerModel->all();
        return view('index', $data);
    }
    public function create() {
        return view('create');
    }
    public function store(Request $request) {
        // backend validation -> all fields are required
        $validation = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'address' => 'required',
            'dob' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required'
        ]);
        if($validation->fails()){
            return redirect()->route('customerCreate')->with('errors', $validation->errors());
        } else {
            $data = $request->all();
            $mobile = $data['mobile'];
            $phone = $data['phone'];
            $data['f_name'] = $request['first_name'];
            $data['l_name'] = $request['last_name'];
            $newCustomer = $this->customerModel->create($data);
            // adding contact details
            foreach ($mobile as $key => $value) {
                if(!($phone[$key] == null & $value == null)){
                    // check if both fields are empty
                    // attach key word did't worked properly..
                    // so inserted into contact table with insert
                    $newCustomer->contacts()->insert([
                        "customer_id" => $newCustomer->id,
                        "mobile" => isset($value) ? $value : "",
                        "phone" => isset($phone[$key]) ? $phone[$key] : "" 
                    ]);
                }
                
            }
            if(isset($newCustomer)){
                return redirect()->route('customerIndex')->with('success', 'Customer added successfuly..');
            } else {
                return redirect()->route('customerIndex')->with('warning', 'Failed customer adding..');
            }
        }
    
    }

    public function edit(int $customer_id) {
        $customer = $this->customerModel->find($customer_id);
        if(isset($customer)){
            $customer['dob'] = date('Y-m-d', strtotime($customer['dob']));
            return view('edit', array("customer" => $customer, "contacts" => $customer->contacts));
        } else {
            return redirect()->route('customerIndex')->with('warning', 'Customer not found..');
        }
    }

    public function update(int $customer_id, Request $request) {
        
        $validation = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required',
            'dob' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);
        if($validation->fails()){
            return redirect('customer/'.$customer_id.'/edit')->with('errors', $validation->errors());
        } else {
            $existCust = $this->customerModel->find($customer_id);
            if(isset($existCust)){
                $updtCust = $request->all();
                $mobile = $updtCust['mobile'];
                $phone = $updtCust['phone'];
                $updtCust['f_name'] = $request['first_name'];
                $updtCust['l_name'] = $request['last_name'];
                $existCont = $existCust->contacts;

                foreach ($mobile as $key => $value) {
                    if(!($phone[$key] == null & $value == null)){
                        // check if both fields are empty
                        // sync key word not worked properly.. 
                        // so checked with previously added contacts and performed update
                        if($key < count($existCont)){
                            $existCont[$key]->update([
                                "mobile" => isset($value) ? $value : "",
                                "phone" => isset($phone[$key]) ? $phone[$key] : "" 
                            ]);
                        } else {
                            $existCust->contacts()->insert([
                                "customer_id" => $customer_id,
                                "mobile" => isset($value) ? $value : "",
                                "phone" => isset($phone[$key]) ? $phone[$key] : "" 
                            ]);
                        }
                    }
                }
                return redirect()->route('customerIndex')->with('success', 'Customer updated successfuly..');
            } else {
                return redirect()->route('customerIndex')->with('warning', 'Failed customer update..');
            }
        }
    
    }
}
