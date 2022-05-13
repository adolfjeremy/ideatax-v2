<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerQuestionRequest;
use App\Models\CustomerQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DiscussionController extends Controller
{
    public function index()
    {
        $customerQuestions = CustomerQuestion::where('status', '=', 'UNANSWERED')->latest()->paginate(6);

        return view('pages.admin.discussion.index',[
            "customerQuestions" => $customerQuestions,
        ]);
    }

     public function answered()
    {
        $customerQuestions = CustomerQuestion::where('status', '=', 'ANSWERED')->latest()->paginate(6);

        return view('pages.admin.discussion.answered',[
            "customerQuestions" => $customerQuestions,
        ]);
    }

    public function edit($id)
    {
        $item = CustomerQuestion::findOrFail($id);

        return view('pages.admin.discussion.edit',[
            "item" => $item,
        ]);
    }

    public function update(CustomerQuestionRequest $request, $id)
    {
        $data = $request->all();

        $item = CustomerQuestion::findOrFail($id);

        if($request->file('photo'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('discussion');
        }
        
        $data['slug'] = Str::slug($request->title);

        $item->update($data);

        return redirect()->route('answered');
    }

    public function destroy($id)
    {
        $item = CustomerQuestion::findOrFail($id);
        Storage::delete($item->photo);
        $item->delete();

        return redirect()->route('discussion.index');
    }
}
