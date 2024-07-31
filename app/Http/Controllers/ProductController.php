<?php

namespace App\Http\Controllers;
use App\Models\Product; 
use App\Models\Jwellery;
use App\Models\Owner;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use App\Models\Payment; 
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api; 
use Exception;
 // $products = Product::all();
class ProductController extends Controller
{
        public function index(Request $request)
        {
            
            $query = Product::query();
    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where('name', 'like', '%' . $searchTerm . '%');
    }
    $product = $query->where('status', 'inactive')
                      ->orderBy('name', 'asc')
                      ->get();

    return view('products.index', compact('product'));
        }
    
        public function create()
        {
            return view('products.create');
        }
    
        public function store(Request $request)
        {
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('images'), $imageName);
    
                $imagePath = $imageName;
            } else {
                $imagePath = null;
            }

        
            $product = new Product();
            $product->name = $request->input('name');
            $product->image = $imagePath;
            $product->description = $request->input('description');
            $product->quantity = $request->input('quantity');
            $product->status = $request->input('status');
            $product->price = $request->input('price');
            $product->discount = $request->input('discount');
        
            $product->save();
        
            return redirect()->route('products.index'); 
        }
        
        

        public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.detail', compact('product'));
    }
    
        public function edit($id)
        {
            $product = Product::findOrFail($id);
            return view('products.edit', compact('product'));
        }
        public function update(Request $request, $id)
        {
            $product = Product::findOrFail($id);
           
        
            $imageName= "";
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('images'), $imageName);
    
            } else {
                $imageName = $request->old_image;
            }
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->quantity = $request->input('quantity');
            $product->status = $request->input('status');
            $product->price = $request->input('price');
            $product->discount = $request->input('discount');
            $product->image = $imageName;
            $product->save();
            
            return redirect()->route('products.index');
        }
        
        
    
        public function destroy($id)
        {
            $product = Product::findOrFail($id);
            $product->delete();
          
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        }

        public function display()
        {
           
            $product = Product::all();
            $jwellerys=Jwellery::all();
            $owners=Owner::all();
        
            return view('frontend.index', compact('product','jwellerys','owners'));
        }
       
        public function see($id)
        {
            $products = Product::findOrFail($id);
        return view('frontend.see',compact('products'));
        }

        public function exportPdf()
        {
            $products = Product::all();
    
            $html = view('products.pdf', compact('products'))->render();
    
            $mpdf = new Mpdf();
            $mpdf->WriteHTML($html);
            return $mpdf->Output('products.pdf', 'D');
        }
        public function exportExcel()
        {
            $products = Product::all();
    
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
    
            // Set the header
            $sheet->setCellValue('A1', 'Name');
            $sheet->setCellValue('B1', 'Description');
            $sheet->setCellValue('C1', 'Quantity');
            $sheet->setCellValue('D1', 'Status');
            $sheet->setCellValue('E1', 'Price');
            $sheet->setCellValue('F1', 'Discount');
    
            // Populate the data
            $row = 2;
            foreach ($products as $product) {
                $sheet->setCellValue('A' . $row, $product->name);
                $sheet->setCellValue('B' . $row, $product->description);
                $sheet->setCellValue('C' . $row, $product->quantity);
                $sheet->setCellValue('D' . $row, $product->status);
                $sheet->setCellValue('E' . $row, $product->price);
                $sheet->setCellValue('F' . $row, $product->discount);
                $row++;
            }
    
            // Write to a temporary file
            $writer = new Xlsx($spreadsheet);
            $fileName = 'products.xlsx';
            $temp_file = tempnam(sys_get_temp_dir(), $fileName);
            $writer->save($temp_file);
    
            // Return the file as a response
            return Response::download($temp_file, $fileName)->deleteFileAfterSend(true);
        }

        public function exportCsv()
      {
    $products = Product::all();

    $filename = "products.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, ['Name', 'Description', 'Quantity', 'Status', 'Price', 'Discount']);

    foreach($products as $product) {
        fputcsv($handle, [
            $product->name,
            $product->description,
            $product->quantity,
            $product->status,
            $product->price,
            $product->discount
        ]);
    }

    fclose($handle);

    $headers = [
        'Content-Type' => 'text/csv',
    ];

    return Response::download($filename, $filename, $headers);
}

public function store2(Request $request)
{
    $input = $request->all();
    $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    $payment = $api->payment->fetch($input['razorpay_payment_id']);
    if(count($input) && !empty($input['razorpay_payment_id'])) {
        try {
            $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            $payment = Payment::create([
                'r_payment_id' => $response['id'],
                'method' => $response['method'],
                'currency' => $response['currency'],
                'user_email' => $response['email'],
                'amount' => $response['amount']/100,
                'json_response' => json_encode((array)$response)
            ]);
        } catch(Exception $e) {
            return $e->getMessage();
            Session::put('error',$e->getMessage());
            return redirect()->back();
        }
    }
    Session::put('success',('Payment Successful'));
        return redirect()->back();
}


}

