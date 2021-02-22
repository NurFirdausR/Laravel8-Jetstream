<?php

namespace App\Exports;

use App\Models\Category;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
class CategoryExport implements FromView,WithDrawings
{
    use Exportable;
    /**
     * 
    * @return \Illuminate\Support\Collection
    */
    

    public function view(): View
    {
        # code...
        return view('export',[
            'category' => Category::all()
        ]);
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setPath(public_path('/laravel.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

}
