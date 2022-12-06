<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use App\Models\Asset as AssetModel;
use App\Models\Inventory;

class Asset extends Component
{
    use Actions;
    public $filter_id;
    public $manage_category = false;
    public $category_name;

    public $add_modal = false;
    public $asset_name,
        $asset_category,
        $asset_description,
        $asset_remarks,
        $asset_price,
        $isBundle = false,
        $asset_quantity,
        $asset_serial_number;

    public function render()
    {
        return view('livewire.admin.asset', [
            'categories' => Category::all(),
            'inventories' => Inventory::with('assets')
                ->when($this->filter_id, function ($query) {
                    $query->whereHas('assets', function ($query) {
                        $query->where('category_id', $this->filter_id);
                    });
                })
                ->get(),
        ]);
    }

    public function saveCategory()
    {
        $this->validate([
            'category_name' => 'required|unique:categories,name',
        ]);

        Category::create([
            'name' => $this->category_name,
        ]);

        $this->category_name = '';
        $this->notification()->success(
            $title = 'Success',
            $description = 'Category was successfull saved'
        );
    }

    public function saveAsset()
    {
        $alpha = [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',
        ];

        $this->validate([
            'asset_name' => 'required|unique:assets,name',
            'asset_category' => 'required',
            'asset_price' => 'required',
            'asset_description' => 'required',
            'asset_remarks' => 'required',
            'asset_serial_number' => 'required|unique:assets,serial_number',
        ]);

        $query = AssetModel::where(
            'category_id',
            $this->asset_category
        )->count();

        $query += 1;
        $cat = $this->asset_category - 1;
        $inventory_code =
            'IMAN-' . $alpha[$cat] . str_pad($query, 3, '0', STR_PAD_LEFT);

        if ($this->isBundle == true) {
            $this->validate([
                'asset_quantity' => 'required',
            ]);

            $asset = AssetModel::create([
                'name' => $this->asset_name,
                'category_id' => $this->asset_category,
                'description' => $this->asset_description,
                'remarks' => $this->asset_remarks,
                'price' => $this->asset_price,
                'serial_number' => $this->asset_serial_number,
            ]);

            Inventory::create([
                'asset_id' => $asset->id,
                'quantity' => $this->asset_quantity,
                'inventory_code' => $inventory_code,
                'is_bundle' => true,
            ]);

            $this->reset([
                'asset_name',
                'asset_category',
                'asset_description',
                'asset_quantity',
                'asset_remarks',
                'asset_price',
                'asset_serial_number',
            ]);

            $this->notification()->success(
                $title = 'Success',
                $description = 'Asset was successfull saved'
            );

            $this->add_modal = false;
        } else {
            $asset = AssetModel::create([
                'name' => $this->asset_name,
                'category_id' => $this->asset_category,
                'description' => $this->asset_description,
                'remarks' => $this->asset_remarks,
                'price' => $this->asset_price,
                'serial_number' => $this->asset_serial_number,
            ]);

            Inventory::create([
                'asset_id' => $asset->id,
                'inventory_code' => $inventory_code,
                'is_bundle' => false,
            ]);

            $this->reset([
                'asset_name',
                'asset_category',
                'asset_description',
                'asset_quantity',
                'asset_remarks',
                'asset_price',
                'asset_serial_number',
            ]);

            $this->notification()->success(
                $title = 'Success',
                $description = 'Asset was successfull saved'
            );

            $this->add_modal = false;
        }
    }
}
