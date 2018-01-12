<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Auth;
use App\QA;

class QAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qas = QA::paginate(15);
        return view('qa.index', ['qas' => $qas, 'og_title' => '機車路權月經問題 Q&A', 'og_desc' => '對於網路上不斷重複的機車路權問題回覆到膩了嗎？來這邊找答案，幫你輕鬆打臉']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('qa.index');
        }
        return view('qa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('qa.show', ['id' => $id]);
        }
        $subject = $request->input('subject');
        $response = $request->input('response');
        $qa = QA::create(['subject' => $subject, 'response' => $response]);
        Log::info('Create QA:' . $qa->id . ' by user: ' . Auth::user()->id . '-' . Auth::user()->name . ' with content: ' . $qa->toJson());
        if ($request->input('continue')) {
            return redirect()->route('qa.create');
        }
        return redirect()->route('qa.show', ['id' => $qa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $qa = QA::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            $qa = QA::where("subject", "like", "%$id%")->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $qa = QA::all()->random();
        }
        return view('qa.show', ['qa' => $qa, 'og_title' => $qa->subject, 'og_desc' => $qa->response]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect()->route('qa.show', ['id' => $id]);
        }
        $qa = QA::find($id);
        Log::info('show QA:' . $id . ' edit page for user: ' . Auth::user()->id . '-' . Auth::user()->name);
        return view('qa.create', ['qa' => $qa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('qa.show', ['id' => $id]);
        }
        $subject = $request->input('subject');
        $response = $request->input('response');
        $qa = QA::find($id);
        $old_content = $qa->toJson();
        $qa->update(['subject' => $subject, 'response' => $response]);
        $new_content = $qa->toJson();
        Log::info('Update QA:' . $qa->id . ' by user: ' . Auth::user()->id . '-' . Auth::user()->name . ' with old content: ' . $old_content . ' and new_content: ' . $new_content);
        return redirect()->route('qa.show', ['id' => $qa->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
