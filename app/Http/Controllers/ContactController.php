<?php

namespace App\Http\Controllers;

use App\Repositories\Contact\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $repo;

    public function __construct(ContactRepositoryInterface $contactRepositoryInterface)
    {
        $this->repo = $contactRepositoryInterface;
    }

    public function index()
    {
        $contacts = $this->repo->getAll();

        return view('backend.contact.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rs = $this->repo->store($request);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.contact.index');
    }

    public function edit($contactId)
    {
        $contact = $this->repo->show($contactId);

        return view('backend.contact.edit', compact('contact'));
    }

    public function update(Request $request, $contactId)
    {
        $rs = $this->repo->update($request, $contactId);
        toast($rs['msg'], $rs['stt']);

        return back();
    }

    public function destroy($contactId)
    {
        $rs = $this->repo->destroy($contactId);
        toast($rs['msg'], $rs['stt']);

        return back();
    }
}
