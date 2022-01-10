<?php

namespace App\Http\Controllers;


use App\Jobs\ProcessPodcast;
use App\Models\Job_batch;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

class CsvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('csv.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        set_time_limit(0);
        
        try {
            if ($request->has('file')) {
                $file = $request->file('file');
                $filename = $file->getClientOriginalName();
                $file_with_path = public_path('uploads') . '/' . $filename;
                if (!file_exists($file_with_path)) {
                    $request->file->move(public_path('uploads'), $filename);
                } 
                $header = null;
                $dataFromCSV = array();
                $records = array_map('str_getcsv', file($file_with_path));
                // Rearranging data
                foreach ($records as $record) {
                    if (!$header) {
                        $header = $record;
                    } else {
                        $dataFromCSV[] = $record;
                    } 
                }

                // Breaking data into chunks
                $dataFromCSV = array_chunk($dataFromCSV, 100);
                $batch = Bus::batch([])->dispatch();
                //looping through 100 entries
                foreach ($dataFromCSV as $key => $dataCSV) {
                    // looping through each CSV data
                    foreach ($dataCSV as $data) {
                        $csv_data[$key][] = array_combine($header, $data);
                    }
                    $batch->add(new ProcessPodcast($csv_data[$key])); 
                }
                //update session id every time new batch is processed
                session()->put('lastBatchId', $batch->id);
                return redirect('/progress?id='.$batch->id);   
            }
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('csv.progress');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function progress(){
        return view('csv.progress');
    }
    
    /**
     * Method progress_for_csv_upload
     * Function to get progress while OBS executes
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function progress_for_csv_upload(Request $request){
         try {
             $batchId = $request->id ?? session()->get('lastBatchId');
             if (Job_batch::where('id', $batchId)->count()) {
                 $response = Job_batch::where('id', $batchId)->first();
                 return response()->json($response);
             }
         } catch (Exception $e) {
            Log::error($e);
            dd($e);
         }
    }

    
}
