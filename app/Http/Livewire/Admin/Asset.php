<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use App\Models\Asset as AssetModel;

class Asset extends Component
{
    use Actions;
    public $filter_id;
    public $manage_category = false;
    public $category_name;

    public $add_modal = false;
    public $asset_name, $asset_category, $asset_description, $asset_quantity;

    public function render()
    {
        return view('livewire.admin.asset', [
            'categories' => Category::all(),
            'assets' => AssetModel::when($this->filter_id, function ($query) {
                $query->where('category_id', $this->filter_id);
            })->get(),
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
        $this->validate([
            'asset_name' => 'required|unique:assets,name',
            'asset_category' => 'required',
            'asset_description' => 'required',
            'asset_quantity' => 'required',
        ]);

        AssetModel::create([
            'name' => $this->asset_name,
            'category_id' => $this->asset_category,
            'description' => $this->asset_description,
            'quantity' => $this->asset_quantity,
        ]);

        $this->asset_name = '';
        $this->asset_category = '';
        $this->asset_description = '';
        $this->asset_quantity = '';

        $this->notification()->success(
            $title = 'Success',
            $description = 'Asset was successfull saved'
        );

        $this->add_modal = false;
    }
}
