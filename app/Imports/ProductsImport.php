<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $productData = [
                'category_id'     => $row['category_id'] ?? null,
                'subcategory_id'  => $row['subcategory_id'] ?? null,
                'code'            => $row['code'] ?? null,
                'name'            => $row['name'] ?? null,
                'description'     => $row['description'] ?? null,
                'image'           => $row['image'] ?? null,
                'price'           => $row['price'] ?? null,
                'stock_qty'       => $row['stock_qty'] ?? null,
            ];

            Product::updateOrCreate(
                ['code' => $productData['code']], // Use 'code' as the unique key
                $productData
            );
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
