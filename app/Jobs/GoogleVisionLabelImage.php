<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $ad_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($ad_image_id)
    {
        $this->ad_image_id = $ad_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->ad_image_id);

        // se l'immagine non viene trovata, termina qui il job
        if(!$i){
            return;
        }

        // recuperiamo l'effettivo file e non il campo del database
        $image = file_get_contents(storage_path('app/public/'.$i->path));

        // utilizziamo putenv in quanto il file delle credenziali è troppo grande per inserirlo direttamente nel file .env
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
        
    }
}
