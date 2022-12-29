<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Asset;
use Carbon\Carbon;
use App\Models\RequestTransaction;
use App\Models\EmployeeInformation;
use App\Models\ReturnAsset;
use App\Models\Transaction;
use App\Models\UnreturnedAsset;
use App\Models\BlackListed;
class Report extends Component
{
    public $report1_modal = false;
    public $report2_modal = false;
    public $report3_modal = false;
    public $report4_modal = false;
    public $report5_modal = false;
    public $report6_modal = false;
    public $report7_modal = false;
    public $report8_modal = false;

    public $start_date, $end_date;
    public function render()
    {
        return view('livewire.admin.report', [
            'damages' => ReturnAsset::whereIn('status', [4, 5])
                ->when($this->start_date, function ($query) {
                    $query->where('created_at', '>=', $this->start_date);
                })
                ->when($this->end_date, function ($query) {
                    $query->where('created_at', '<=', $this->end_date);
                })
                ->get(),
            'new_added' => Asset::where(
                'created_at',
                '>=',
                Carbon::now()->subDays(5)
            )->get(),
            'borrowed' => Asset::withCount('borrowedAssets')
                ->having('borrowed_assets_count', 5)
                ->get(),
            'leasts' => Asset::withCount('requestTransactions')
                ->having('request_transactions_count', '<', 3)
                ->get(),
            'unreturned' => UnreturnedAsset::all(),
            'recently' => Asset::where(
                'created_at',
                '>=',
                Carbon::now()->subDays(5)
            )->get(),
            'losts' => ReturnAsset::where('status', 6)
                ->when($this->start_date, function ($query) {
                    $query->where('created_at', '>=', $this->start_date);
                })
                ->when($this->end_date, function ($query) {
                    $query->where('created_at', '<=', $this->end_date);
                })
                ->get(),
            'employees' => BlackListed::when($this->start_date, function (
                $query
            ) {
                $query->where('created_at', '>=', $this->start_date);
            })
                ->when($this->end_date, function ($query) {
                    $query->where('created_at', '<=', $this->end_date);
                })
                ->get(),
        ]);
    }

    public function viewReport($report_type)
    {
        switch ($report_type) {
            case 1:
                $this->report1_modal = true;
                break;

            case 2:
                $this->report2_modal = true;
                break;

            case 3:
                $this->report3_modal = true;
                break;
            case 4:
                $this->report4_modal = true;
                break;

            case 5:
                $transaction = Transaction::where('status', 2)
                    ->where('returned_date', '<=', now())
                    ->get();

                if ($transaction) {
                    if (
                        UnreturnedAsset::where(
                            'user_id',
                            $transaction->first()->user_id
                        )
                            ->where(
                                'borrowed_date',
                                $transaction->first()->borrowed_date
                            )
                            ->where(
                                'returned_date',
                                $transaction->first()->returned_date
                            )
                            ->exists()
                    ) {
                    } else {
                        foreach (
                            $transaction->first()->requests->first()
                                ->requestTransactions
                            as $asset
                        ) {
                            UnreturnedAsset::create([
                                'asset_id' => $asset->asset_id,
                                'user_id' => $transaction->first()->user_id,
                                'borrowed_date' => $transaction->first()
                                    ->borrowed_date,
                                'returned_date' => $transaction->first()
                                    ->returned_date,
                            ]);
                        }
                    }
                }

                $this->report5_modal = true;
                break;

            case 6:
                $this->report6_modal = true;
                break;

            case 7:
                $this->report7_modal = true;
                break;

            case 8:
                $this->report8_modal = true;
                break;

            default:
                # code...
                break;
        }
    }
}
