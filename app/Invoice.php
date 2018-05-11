<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $fillable = [
        'company_id','user_id', 'invoice_num', 'buyer_name','buyer_address', 'buyer_oib', 'seller_name', 
        'seller_address', 'seller_oib', 'payment_option', 'invoice_date', 'additional_option'
    ];
   public function invoiceItems()
    {
    	return $this->hasMany('App\InvoiceItem');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
