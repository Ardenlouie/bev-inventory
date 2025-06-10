<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Refreshable;
use Illuminate\Support\Facades\DB;

class Refreshables extends Component
{
    public $year=0, $from=0, $to=0;
    public $refreshable;
    public $headers = [];
    public $rows = [];
    public $filters = [];


    public function mount($refreshable) {

        $this->refreshable = $refreshable;

        
    }

    public function render()
    {
        $spCode = $this->refreshable->sp_code;

        $results = DB::connection('sqlsrv2')->select("EXEC $spCode ?, ?, ?", [
            $this->year,
            $this->from,
            $this->to,
        ]);
         if (!empty($results)) {
            // Convert stdClass objects to arrays
            $data = array_map(function ($item) {
                return (array) $item;
            }, $results);

            // Set the first row as headers and the rest as data
            $this->headers = array_keys($data[0]);

            // Apply column filters
            $filteredData = collect($data)->filter(function ($row) {
                foreach ($this->filters as $key => $value) {
                    if ($value && stripos($row[$key], $value) === false) {
                        return false;
                    }
                }
                return true;
            })->toArray();

            $this->rows = $filteredData;
        } else {
            $this->headers = [];
            $this->rows = [];
        }

        return view('livewire.refreshables')->with([
            'results' => $results,

        ]);
    }
}
