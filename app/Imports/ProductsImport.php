<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Log;

class ProductsImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (empty(trim($row['name']))) {
                Log::warning('Skipping row due to missing name: ' . json_encode($row->toArray()));
                continue;
            }

            $productData = [
                'category_id'    => $row['category_id'] ?? null,
                'subcategory_id' => $row['subcategory_id'] ?? null,
                'code'           => $row['code'] ?? null,
                'name'           => trim($row['name']),
                'description'    => $row['description'] ?? null,
                'image'          => $row['image'] ?? null,
                'brand'          => $row['brand'] ?? null,
            ];

            // Use 'id' for updates if provided, otherwise use 'code'
            $attributes = !empty($row['id']) ? ['id' => $row['id']] : ['code' => $productData['code']];

            Product::updateOrCreate(
                $attributes,
                $productData
            );
        }
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['nullable', 'string', 'max:255'],
            'id' => ['nullable', 'exists:products,id'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'subcategory_id' => ['nullable', 'exists:subcategories,id'],
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function onError(\Throwable $e)
    {
        Log::error('Error importing product: ' . $e->getMessage());
    }
}
