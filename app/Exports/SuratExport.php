<?php

namespace App\Exports;

use App\Models\Letter;
use App\Models\Letters;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SuratExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Letters::with('letterType')->get();
    
    }

    public function headings(): array
    {
        return [
            "Nomor Surat", "Perihal", "Tanggal Keluar", "Penerima Surat", "Notulis"
        ];
    }

    public function map($item): array
    {
        
        setlocale(LC_ALL, 'IND');
        
        $tanggal = Carbon::parse($item->letterType->created_at)->formatLocalized('%d %B %Y');
        $dataresult = [];
        foreach ($item['recipients'] as $a){
            $data = $a['name'];

            array_push($dataresult, $data);
        }
       

        return [
            $item->letterType->letter_code,
            $item->letterType->name_type,
            $tanggal,
            $dataresult,
            $item->user->name,
        ];
    }

}
