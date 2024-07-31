<?php

namespace App\Http\Controllers;

use App\Models\Jwellery;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;

class JwelleryController extends Controller
{
   public function index(Request $request)  {
    // $query = Jwellery::query();
    // if ($request->has('search')) {
    //     $searchTerm = $request->input('search');
    //     $query->where('name', 'like', '%' . $searchTerm . '%');
    // }
    $jwellerys = Jwellery::orderBy('name', 'asc')->get();
    //$jwellerys=Jwellery::all();
    return view("jwellery.index", compact('jwellerys'));
   }

   public function create()
   {
   
           return view('jwellery.create');
      
   }

   public function store(Request $request) {
   
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif',
        'quantity' => 'required|integer',
        'price' => 'required|numeric',
    ]);
    // dd($request->all());
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageName);

        $imagePath = $imageName;
    } else {
        $imagePath = null;
    }

    $jwellery=new Jwellery();
    $jwellery->name = $request->input('name');
    $jwellery->image = $imagePath;
    $jwellery->quantity = $request->input('quantity');
    $jwellery->price = $request->input('price');
    $jwellery->save();

    
    return redirect()->route('jwellery.index')->with('success', 'Product added successfully.');
   }
    
    public function show($id)
    {
        $jwellery = Jwellery::findOrFail($id);
        return view('jwellery.detail', compact('jwellery'));
    }
    
        public function edit($id)
        {
            $jwellery = Jwellery::findOrFail($id);
            return view('jwellery.edit', compact('jwellery'));
        }
        public function update(Request $request, $id)
        {
            
            $jwellery = Jwellery::findOrFail($id);

            $imageName= "";
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('images'), $imageName);
    
            } else {
                $imageName = $request->old_image;
            }
            $jwellery->name = $request->input('name');
            $jwellery->quantity = $request->input('quantity');
            $jwellery->price = $request->input('price');
            $jwellery->image = $imageName;
            $jwellery->save();
            
            return redirect()->route('jwellery.index');
        }
        
        
    
        public function destroy($id)
        {
            $jwellery = Jwellery::findOrFail($id);
            $jwellery->delete();
          
            return redirect()->route('jwellery.index')->with('success', 'Product deleted successfully.');
        }


      
        public function exportExcel()
        {
            $jewellery = Jwellery::all();
    
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
    
            // Set the header
            $sheet->setCellValue('A1', 'Name');
            $sheet->setCellValue('B1', 'Quantity');;
            $sheet->setCellValue('C1', 'Price');
          
    
            // Populate the data
            $row = 2;
            foreach ($jewellery as $item) {
                $sheet->setCellValue('A' . $row, $item->name);
                $sheet->setCellValue('B' . $row, $item->quantity);
                $sheet->setCellValue('C' . $row, $item->price);
        
                $row++;
            }
            $writer = new Xlsx($spreadsheet);
            $fileName = 'jwellery.xlsx';
            $temp_file = tempnam(sys_get_temp_dir(), $fileName);
            $writer->save($temp_file);
    
            return Response::download($temp_file, $fileName)->deleteFileAfterSend(true);
        }

        public function see($id)
        {
            $jewellery = Jwellery::findOrFail($id);
        return view('jwellery.see',compact('jewellery'));
        }

}

