<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Category;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesTable extends Component
{
    use WithPagination;

    public string $search = '';

    public int $paginateNumber = 10;
    #[Locked]
    public string $sortField = 'name';

    #[Locked]
    public string $sortDirection = 'ASC';

    public array $sortableFields = ['name'];

    public function sortBy($sortField)
    {
        if (!in_array($sortField, $this->sortableFields)) {
            return;
        }

        $this->resetPage();

        if ($sortField === $this->sortField) {
            $this->sortDirection = $this->sortDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->sortDirection = 'ASC';
            $this->sortField = $sortField;
        }
    }

    public function render()
    {
        $query = Category::latest()->orderBy($this->sortField, $this->sortDirection);

        if ($this->search) {
            $query->whereLike('name', '%' . $this->search . '%');
        }

        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('livewire.admin.tables.categories-table', [
            'categories' => $query->paginate($this->paginateNumber)
        ]);
    }
}
