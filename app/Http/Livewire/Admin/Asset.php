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
    public $option_modal = false;
    public $asset_id;
    public $view_modal = false;
    public $edit_modal = false;
    public $delete_modal = false;

    public $add_modal = false;
    public $asset_name,
        $asset_inventory_code,
        $asset_category,
        $asset_description,
        $asset_remarks,
        $remarks_reason,
        $asset_price,
        $isBundle = false,
        $asset_quantity,
        $asset_serial_number;

    public function render()
    {
        return view('livewire.admin.asset', [
            'categories' => Category::all(),
            'inventories' => Inventory::when($this->filter_id, function (
                $query
            ) {
                $query->whereHas('assets', function ($q) {
                    $q->where('category_id', $this->filter_id);
                });
            })
                ->with('assets.category')
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
            'asset_category' => 'required',
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
                'reason' => $this->remarks_reason,
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
                'remarks_reason',
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

    public function openOption($asset_id)
    {
        $this->asset_id = $asset_id;
        $this->option_modal = true;
    }

    public function viewAsset()
    {
        $this->option_modal = false;
        $this->view_modal = true;
        $asset = Inventory::where('asset_id', $this->asset_id)->first();
        $this->asset_inventory_code = $asset->inventory_code;
        $this->asset_serial_number = $asset->assets->first()->serial_number;
        $this->asset_name = $asset->assets->first()->name;
        $this->asset_category = $asset->assets->first()->category->name;
        $this->asset_description = $asset->assets->first()->description;
        $this->asset_remarks = $asset->assets->first()->remarks;
        $this->asset_price = $asset->assets->first()->price;
        if ($asset->remarks == 4 || $asset->remarks == 5) {
            $this->remarks_reason = $asset->assets->first()->reason;
        }
    }

    public function editAsset()
    {
        $this->option_modal = false;
        $this->edit_modal = true;

        $asset = Inventory::where('asset_id', $this->asset_id)->first();
        $this->asset_inventory_code = $asset->inventory_code;
        $this->asset_serial_number = $asset->assets->first()->serial_number;
        $this->asset_name = $asset->assets->first()->name;
        $this->asset_category = $asset->assets->first()->category_id;
        $this->asset_description = $asset->assets->first()->description;
        $this->asset_remarks = $asset->assets->first()->remarks;
        $this->asset_price = $asset->assets->first()->price;
        if ($asset->remarks == 4 || $asset->remarks == 5) {
            $this->remarks_reason = $asset->assets->first()->reason;
        }
    }

    public function updateAsset()
    {
        $this->validate([
            'asset_name' => 'required',
            'asset_category' => 'required',
            'asset_description' => 'required',
            'asset_remarks' => 'required',
            'asset_price' => 'required',
            'asset_serial_number' => 'required',
        ]);
        $asset = assetModel::where('id', '=', $this->asset_id)->first();
        $asset->update([
            'name' => $this->asset_name,
            'category_id' => $this->asset_category,
            'description' => $this->asset_description,
            'remarks' => $this->asset_remarks,
            'price' => $this->asset_price,
            'serial_number' => $this->asset_serial_number,
            'reason' => $this->remarks_reason,
        ]);
        $this->reset([
            'asset_name',
            'asset_category',
            'asset_description',
            'asset_remarks',
            'asset_price',
            'asset_serial_number',
            'remarks_reason',
        ]);
        $this->notification()->success(
            $title = 'Success',
            $description = 'Asset was updated'
        );
        $this->edit_modal = false;
    }
}
