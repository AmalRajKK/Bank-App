<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class BankingController extends Controller
{
    public function index()
    {
        $account = Account::where('user_id', Auth::id())->first();
        return view('userMenu', compact('account'));
    }

    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $account = Account::where('user_id', Auth::id())->first();
        $account->balance = $account->balance + $request->amount;
        $account->save();

        Transaction::create([
            'user_id' => Auth::id(),
            'account_id' => $account->id,
            'type' => 'credit',
            'details' => 'deposit',
            'amount' => $request->amount,
            'balance' => $account->balance,
        ]);

        return redirect('/userMenu');
    }


    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $account = Account::where('user_id', Auth::id())->first();

        if ($account->balance < $request->amount) {
            return redirect()->back()->withErrors(['noBalance' => 'Insufficient balance']);
        }

        $account->balance = $account->balance - $request->amount;
        $account->save();

        Transaction::create([
            'user_id' => Auth::id(),
            'account_id' => $account->id,
            'type' => 'debit',
            'details' => 'withdraw',
            'amount' => $request->amount,
            'balance' => $account->balance,
        ]);

        return redirect('/userMenu');
    }


    public function transfer(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'email' => 'required|email',
        ]);

        $recipient = User::where('email', $request->email)->first();

        if (!$recipient) {
            return redirect()->back()->withErrors(['noUser' => 'user not exist']);
        }

        $account = Account::where('user_id', Auth::id())->first();
        $recipientAccount = Account::where('user_id', $recipient->id)->first();

        if ($account->balance < $request->amount) {
            return redirect()->back()->withErrors(['noBalance' => 'Insufficient balance']);
        }

        $account->balance = $account->balance - $request->amount;
        $account->save();

        $recipientAccount->balance = $recipientAccount->balance + $request->amount;
        $recipientAccount->save();

        Transaction::create([
            'user_id' => Auth::id(),
            'account_id' => $account->id,
            'type' => 'debit',
            'details' => 'transfer to ' . $recipient->email,
            'amount' => $request->amount,
            'balance' => $account->balance,
            'recipient_id' => $recipient->id,
        ]);

        Transaction::create([
            'user_id' => $recipient->id,
            'account_id' => $recipientAccount->id,
            'type' => 'credit',
            'details' => 'transfer from ' . Auth::user()->email,
            'amount' => $request->amount,
            'balance' => $recipientAccount->balance,
            'recipient_id' => Auth::id(),
        ]);

        return redirect('/userMenu');
    }



    public function statement()
    {
        $userId = Auth::id();

        $transactions = Transaction::with('recipient')->where('user_id', $userId)->paginate(10);;

        return view('banking.statement', compact('transactions'));
    }


    public function depositView()
    {
        return view('banking.deposit');
    }
    public function withdrawView()
    {
        return view('banking.withdraw');
    }
    public function transferView()
    {
        return view('banking.transfer');
    }
}
