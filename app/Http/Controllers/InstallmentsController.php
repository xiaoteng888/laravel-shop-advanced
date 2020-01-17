<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installment;

class InstallmentsController extends Controller
{
     public function index(Request $request)
     {
        $Installments = Installment::query()
                                ->where('user_id',$request->user()->id)
                                ->paginate(10);
            return view('Installments.index',['installments' => $Installments]);                    
     }
}
