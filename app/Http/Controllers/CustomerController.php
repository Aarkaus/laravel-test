<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;

class CustomerController extends Controller
{
    public function sales_report()
    {
        $customers = array();

        // Customer Loop
        foreach (Customer::orderBy('name')->get() as $customer) {
            $temp = array();

            // Basic info we don't need to do anything to
            $temp['name'] = $customer->name;
            $temp['status'] = $customer->customerStatus->name;

            // Order Info
            $orders = Order::where('customer_id', $customer->id)
                ->where('order_status', 'Completed')
                ->get();

            $temp['orders'] = $orders->count();
            $temp['total'] = $orders->sum('order_total');    

            // Active Customers that haven't purchased anything in 12 Months
            $activeNoOrders = Order::where('customer_id', $customer->id)
                ->where('order_status', 'Completed')
                ->where('created_date_time', '>=', now()->subYear(1))
                ->get();

            $temp['activeNoOrders'] = (
                ($activeNoOrders->count() === 0)
                && ($customer->customerStatus->code === 'AC')
            );
            
            // Active customers that have spent over $200 in the last 3 Months
            $vip = Order::where('customer_id', $customer->id)
                ->where('order_status', 'Completed')
                ->where('created_date_time', '>=', now()->subMonth(3))
                ->get();

            $temp['vip'] = (
                ($vip->sum('order_total') >= 200) 
                && ($customer->customerStatus->code === 'AC')
            );

            // Add to main object
            $customers[] = (object) $temp;
        }

        return view('sales_report', [
            'customers' => (object) $customers
        ]);
    }
}
