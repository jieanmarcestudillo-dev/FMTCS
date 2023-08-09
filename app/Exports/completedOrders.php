<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Orders;

class completedOrders implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings() : array
    {
        return [
            'No.',
            'Track Number',
            'Name',
            'Phone',
            'Created At'
        ];
    }

    public function collection()
    {
        $order = Orders::select('orders.order_id','orders.track_num','orders.created_at','users.name','users.phone')
        ->join('users','orders.user_id', '=', 'users.id')->orderBy('orders.created_at' , 'DESC')->get();
        $completedOrders = [];
        foreach ($order as $index => $item) {
            $completedOrders[] = [
                'No.' => $index + 1,
                'Track Number' => $item->track_num,
                'Name' => $item->name,
                'Phone' => $item->phone,
                'Created At' => date('F d, Y', strtotime($item->created_at))
            ];
        }
        return collect($completedOrders);
    }
}
