<?php

namespace App\Livewire\Dashboard\Investor;

use App\Models\Investor;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ListAction extends Component
{
    use WithPagination, WithoutUrlPagination;

    public ?string $query = '';

    public ?string $orderName = 'asc';

    #[Locked]
    public bool $showTrashed = false;

    #[Computed]
    public function investors()
    {
        return Investor::query()->when($this->query, function ($query) {
            $query->where(function ($q) {
                $q->where('full_name', 'like', "%{$this->query}%")
                    ->orWhere('nickname', 'like', "%{$this->query}%")
                    ->orWhere('email', 'like', "%{$this->query}%");
            });
        })->when($this->orderName, function ($query) {
            return $query->orderBy('full_name', $this->orderName);
        })->when($this->showTrashed, function ($query) {
            return $query->withTrashed();
        })
        ->paginate(9);
    }

    public function paginationView()
    {
        return 'components.table.custom-pagination';
    }

    public function toggleShowTrashed()
    {
        $this->showTrashed = !$this->showTrashed;
        $this->resetPage();
    }

    public function sortName()
    {
        if (!$this->orderName) {
            $this->orderName = 'asc';
        } else if ($this->orderName === 'asc') {
            $this->orderName =  'desc';
        } else {
            $this->orderName = '';
        }
    }

    public function delete($id)
    {
        Investor::destroy($id);
    }

    public function generateCsv()
    {
        $csvContent = '';

        // Open a memory stream
        $file = fopen('php://temp', 'r+');
    
        // Write the CSV headers
        fputcsv($file, ['Full Name', 'Nickname', 'Email', 'Status', 'Date']);
    
        // Write the CSV rows
        Investor::all()->each(function ($investor) use ($file) {
            fputcsv($file, [
                $investor->full_name,
                $investor->nickname,
                $investor->email,
                $investor->status,
                $investor->created_at->format('d/m/y')
            ]);
        });
    
        // Rewind the memory stream
        rewind($file);
    
        // Read the CSV content from the memory stream
        while (($line = fgets($file)) !== false) {
            $csvContent .= $line;
        }
    
        // Close the memory stream
        fclose($file);
    
        // Store the CSV content in a file
        Storage::disk('public')->put('investors.csv', $csvContent);

        $this->js(<<<JS
            const link = document.createElement('a');
            link.href = '/storage/investors.csv';
            link.download = 'investors.csv';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        JS);
        sleep(1);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard.investor.list-action');
    }
}
