<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostSorter extends Component
{
    public $sortBy = 'latest';
    public function render()
    {
        return view('livewire.post-sorter');
    }
    public function sortByDirection()
    {
        return $this->sortBy === 'oldest' ? 'asc' : 'desc';
    }
    public function sortBy($criteria)
    {
        $this->sortBy = $criteria;
    }
}