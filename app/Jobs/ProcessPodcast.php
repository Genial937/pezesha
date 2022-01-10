<?php

namespace App\Jobs;

use App\Models\Upload;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPodcast implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $csvData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($csvData)
    {
        $this->csvData = $csvData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->csvData as $csvData) {
            $upload = new Upload();
            $upload->InvoiceNo = $csvData['InvoiceNo'];
            $upload->StockCode = $csvData['StockCode'];
            $upload->Description = $csvData['Description'];
            $upload->Quantity = $csvData['Quantity'];
            $upload->InvoiceDate = $csvData['InvoiceDate'];
            $upload->UnitPrice = $csvData['UnitPrice'];
            $upload->CustomerID = $csvData['CustomerID'];
            $upload->Country = $csvData['Country'];
            $upload->save();
        }
    }
}
