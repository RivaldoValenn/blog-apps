<!-- resources/views/livewire/post-sorter.blade.php -->

<div>
   <label for="sort">Sort by:</label>
    <select wire:model="sortBy" id="sort" name="sort" class="form-control">
        <option value="latest">Latest</option>
        <option value="oldest">Oldest</option>
        <option value="most-likes">Most Likes</option>
    </select>
</div>
