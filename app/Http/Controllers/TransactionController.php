<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = DB::table('transactions')->orderByDesc('created_at')->get();

        return view('backend.transaction.index', compact('transactions'));
    }

    public function show($transactionId)
    {
        $transaction = DB::table('transactions')->find($transactionId);

        return view('backend.transaction.show', compact('transaction'));
    }
}
