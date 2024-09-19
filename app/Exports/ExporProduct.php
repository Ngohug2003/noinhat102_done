<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ExporProduct implements FromCollection, WithHeadings, WithColumnWidths, WithStyles, WithDrawings
{
    private $products;

    public function __construct()
    {
        $this->products = Product::with('category:name,id')
            ->select('id', 'category_id', 'name', 'price', 'discount', 'short_description', 'description', 'image', 'created_at', 'updated_at')
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'category_name' => $product->category->name,
                    'name' => $product->name,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'short_description' => $product->short_description,
                    'description' => strip_tags($product->description),
                    'image' => $product->image,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at,
                ];
            });
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->products->map(function ($product) {
            return [
                'id' => $product['id'],
                'category_name' => $product['category_name'],
                'name' => $product['name'],
                'price' => $product['price'],
                'discount' => $product['discount'],
                'short_description' => $product['short_description'],
                'description' => $product['description'],
                'image' => $product['image'],
                'created_at' => $product['created_at'],
                'updated_at' => $product['updated_at'],
            ];
        });
    }

    /**
     * Define the headings of the columns
     * 
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Category Name',
            'Name',
            'Price',
            'Discount',
            'Short Description',
            'Description',
            'Image',
            'Created At',
            'Updated At',
        ];
    }

    /**
     * Set the column widths
     * 
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 25,
            'C' => 25,
            'D' => 15,
            'E' => 15,
            'F' => 40,
            'G' => 60,
            'H' => 20, // Image
            'I' => 20,
            'J' => 20,
        ];
    }

    /**
     * Apply styles to the worksheet
     * 
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        // Tự động điều chỉnh chiều cao của hàng dựa trên nội dung hoặc hình ảnh
        foreach ($this->products as $index => $product) {
            $row = $index + 2; // Bắt đầu từ hàng 2 vì hàng 1 là tiêu đề
            $sheet->getRowDimension($row)->setRowHeight(80); // Đặt chiều cao hàng cho hàng có hình ảnh
        }

        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    /**
     * Insert images into the Excel file
     * 
     * @param Worksheet $sheet
     * @return \Illuminate\Support\Collection
     */
    public function drawings()
    {
        $drawings = [];
        foreach ($this->products as $index => $product) {
            if ($product['image']) {
                $drawing = new Drawing();
                $drawing->setName('Product Image');
                $drawing->setDescription('Image of product');
                $drawing->setPath(public_path('storage/' . $product['image']));
                $drawing->setHeight(60);
                $drawing->setCoordinates('H' . ($index + 2));
                $drawings[] = $drawing;
            }
        }
        return $drawings;
    }
}
