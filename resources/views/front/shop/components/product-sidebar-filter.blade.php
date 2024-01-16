<form action="">
    <div class="filter-widget" id="category-filter">
        <h4 class="fw-title">Categories</h4>
        <ul class="filter-categories">
            @foreach($categories as $category)
                <li class=""><a class="{{Request::is('shop/category/'.$category->name) ? 'active' : ''}}" href="/shop/category/{{$category->name}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget" id="brand-filter">
        <h4 class="fw-title">Brands</h4>
        <div class="fw-brand-check">
            @foreach($brands as $brand)
                <div class="bc-item">
                    <label for="bc-{{$brand->id}}">
                        {{$brand->name}}
                        <input type="checkbox"
                               onchange="this.form.submit();"
                               {{(request("brand")[$brand->id] ?? '') == 'on' ? 'checked' : ''}}
                               id="bc-{{$brand->id}}"
                               name="brand[{{$brand->id}}]">
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="filter-widget" id="price-filter">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="min-amount" name="price_min">
                    <input type="text" id="max-amount" name="price_max">
                </div>
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                     data-min="0" data-max="1999"
                     data-min-value="{{str_replace('$', '', request('price_min'))}}"
                     data-max-value="{{str_replace('$', '', request('price_max'))}}">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                </div>
            </div>
        </div>
        <button  type="submit" class="filter-btn">Filter</button>
    </div>
    <div class="filter-widget" id="color-filter">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit()" {{request('color') == 'black' ? 'checked' : ''}}>
                <label for="cs-black" class="cs-black {{request('color') == 'black' ? 'font-weight-bold active' : ''}}">Black</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-blue" name="color" value="blue" onchange="this.form.submit()" {{request('color') == 'blue' ? 'checked' : ''}}>
                <label for="cs-blue" class="cs-blue {{request('color') == 'blue' ? 'font-weight-bold active' : ''}}">Blue</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-green" name="color" value="green" onchange="this.form.submit()" {{request('color') == 'green' ? 'checked' : ''}}>
                <label for="cs-green" class="cs-green {{request('color') == 'green' ? 'font-weight-bold active' : ''}}">Green</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-red" name="color" value="red" onchange="this.form.submit()" {{request('color') == 'red' ? 'checked' : ''}}>
                <label for="cs-red" class="cs-red {{request('color') == 'red' ? 'font-weight-bold active' : ''}}">Red</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-violet" name="color" value="violet" onchange="this.form.submit()" {{request('color') == 'violet' ? 'checked' : ''}}>
                <label for="cs-violet" class="cs-violet {{request('color') == 'violet' ? 'font-weight-bold active' : ''}}">Violet</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-yellow" name="color" value="yellow" onchange="this.form.submit()" {{request('color') == 'yellow' ? 'checked' : ''}}>
                <label for="cs-yellow" class="cs-yellow {{request('color') == 'yellow' ? 'font-weight-bold active' : ''}}">Yellow</label>
            </div>
        </div>
    </div>
    <div class="filter-widget" id="size-filter">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size" name="size" value="s" onchange="this.form.submit()" {{request('size') == 's' ? 'checked' : ''}}>
                <label for="s-size" class="{{request('size') == 's' ? 'active' : ''}}">S</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="m-size" name="size" value="m" onchange="this.form.submit()" {{request('size') == 'm' ? 'checked' : ''}}>
                <label for="m-size" class="{{request('size') == 'm' ? 'active' : ''}}">M</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="l-size" name="size" value="l" onchange="this.form.submit()" {{request('size') == 'l' ? 'checked' : ''}}>
                <label for="l-size" class="{{request('size') == 'l' ? 'active' : ''}}">L</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xl-size" name="size" value="xl" onchange="this.form.submit()" {{request('size') == 'xl' ? 'checked' : ''}}>
                <label for="xl-size" class="{{request('size') == 'xl' ? 'active' : ''}}">XL</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Tag</h4>
        <div class="fw-tags">
            <a href="#">Towel</a>
            <a href="#">Shoes</a>
            <a href="#">Coat</a>
            <a href="#">Dresses</a>
            <a href="#">Trousers</a>
            <a href="#">Hat</a>
            <a href="#">Backpack</a>
        </div>
    </div>
</form>
