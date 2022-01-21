<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'subject' => 'required|min:5|max:50',
            'message' => 'required|min:10',
        ]);

        $enquiry = Enquiry::create($request->all());

        Mail::send(new EnquiryReceived($enquiry));

        toast('Enquiry Sent.', 'success');
        return redirect()->route('index');
    }
}
