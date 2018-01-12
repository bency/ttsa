<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\ReportTimeLine;
use App\TimeLine;
use Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('report.index');
        }
        return view('report.create');
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
            return redirect()->route('report.index');
        }
        $title = $request->input('title');
        $reported_at = strtotime($request->input('reported_at'));
        $content = $request->input('content');
        $pic_url = $request->input('pic_url');
        $company_id = 1;
        $content = $request->input('content', '');
        $report = Report::create([
            'title' => $title,
            'reported_at' => $reported_at,
            'content' => $content,
            'pic_url' => $pic_url,
            'company_id' => $company_id,
        ]);
        ReportTimeLine::create(['report_id' => $report->id, 'time_line_id' => TimeLine::first()->id]);
        if ($request->input('continue')) {
            $request->flash();
            return redirect()->route('report.create');
        }
        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        list($width, $height) = explode('x', array_pad(explode('?', $report->pic_url), 2, '100x100')[1]);
        $data = [
            'report' => $report,
            'og_title' => date('Y-m-d', $report->reported_at) . ' ' . $report->title,
            'og_desc' => $report->content,
            'og_image' => $report->pic_url,
            'og_image_width' => $width,
            'og_image_height' => $height,
        ];
        return view('report.show', $data);
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
            return redirect()->route('report.index');
        }
        $report = Report::find($id);
        return view('report.edit', ['report' => $report]);
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
            return redirect()->route('report.index');
        }
        $report = Report::find($id);
        $timeline_ids = $request->input('timelines', []);
        ReportTimeLine::where('report_id', '=', $id)->delete();
        foreach ($timeline_ids as $timeline_id) {
            ReportTimeLine::create(['report_id' => $id, 'time_line_id' => $timeline_id]);
        }
        $report->update([
            'content' => $request->input('content', ''),
            'title' => $request->input('title'),
            'reported_at' => strtotime($request->input('reported_at')),
            'pic_url' => $request->input('pic_url'),
        ]);
        return redirect()->route('report.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function timelineData($timeline_id)
    {
        $timeline = TimeLine::find($timeline_id);
        $output = [];
        foreach ($timeline->reports()->orderBy('reported_at', 'ASC')->get() as $timeline) {
            $data = [];
            $data['time'] = date('Y-m-d', $timeline->reported_at);
            $data['name'] = $timeline->title;
            $output[] = $data;
        }
        return response()->json($output);
    }
}
