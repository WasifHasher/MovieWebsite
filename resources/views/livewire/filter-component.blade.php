<div class="position-relative mt-3 md:mt-0" x-data="{isOpen:true}">

    <div>
        <input type="search" wire:model="search" placeholder="Search movies..." class="form-control w-100" id="input">
    
       
    </div>

    
    <div class="">{{ $search }}</div>
    

</div>