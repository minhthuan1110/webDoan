<div class="filter_offical">
    <form action="{{ url('/tour/search') }}" method="POST">
        @csrf
        <div class="filter-wrap">
            <div class="filter-wrap-item">
                <span class="filter__icon filter__icon-location"></span>
                <input type="text" name="keyword" class="filter__input" placeholder="Bạn muốn đi đâu?">
            </div>
            {{-- <div class="filter-wrap-item">
                <span class="filter__icon filter__icon-calendar"></span>
                <span class="filter__input filter-selected">Month</span>
                <div type="text" class="filter__list">
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter">
                        <label class="filter__item-month" for="input-select-filter">January</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-1">
                        <label class="filter__item-month" for="input-select-filter-1">March</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-2">
                        <label class="filter__item-month" for="input-select-filter-2">April</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-3">
                        <label class="filter__item-month" for="input-select-filter-3">May</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-4">
                        <label class="filter__item-month" for="input-select-filter-4">June</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-5">
                        <label class="filter__item-month" for="input-select-filter-5">July</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-6">
                        <label class="filter__item-month" for="input-select-filter-6">August</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-7">
                        <label class="filter__item-month" for="input-select-filter-7">September</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-8">
                        <label class="filter__item-month" for="input-select-filter-8">October</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-9">
                        <label class="filter__item-month" for="input-select-filter-9">November</label>
                    </div>
                    <div class="filter__item">
                        <input type="radio" name="category" class="radio" id="input-select-filter-10">
                        <label class="filter__item-month" for="input-select-filter-10">December</label>
                    </div>
                </div>
            </div>
            <div class="filter-wrap-item">
                <span class="filter__icon filter__icon-place"></span>
                <span class="filter__input filter-selected-location">Viet Nam</span>
                <div type="text" class="filter__list filter__list-location">
                    <div class="filter__item-location">
                        <input type="radio" name="category" class="radio" id="input-select-type-1">
                        <label class="filter__item-fil2" for="input-select-type-1">Travel Type</label>
                    </div>
                    <div class="filter__item-location">
                        <input type="radio" name="category" class="radio" id="input-select-type-2">
                        <label class="filter__item-fil2" for="input-select-type-2">Trending</label>
                    </div>
                    <div class="filter__item-location">
                        <input type="radio" name="category" class="radio" id="input-select-type-3">
                        <label class="filter__item-fil2" for="input-select-type-3">Latest</label>
                    </div>
                    <div class="filter__item-location">
                        <input type="radio" name="category" class="radio" id="input-select-type-4">
                        <label class="filter__item-fil2" for="input-select-type-4">Popular</label>
                    </div>
                </div>
            </div> --}}
            <div class="filter-btn-wrap">
                <button type="submit" class="search__btn">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
