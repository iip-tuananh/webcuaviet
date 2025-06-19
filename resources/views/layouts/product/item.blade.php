    <div class="blog-one__single">
        <a class="full-but"
            href="{{ route('detailProduct', ['cate' => $item->cate_slug, 'type' => $item->type_slug ? $item->type_slug : 'loai', 'id' => $item->slug]) }}">
            <div class="tuan-ho ">XEM THÊM</div>
        </a>
        <div class="blog-one__img " style="width: 78%;display: flex;margin: 0 auto;align-content: center;flex-wrap: nowrap;flex-direction: row;justify-content: center;align-items: center;">
            <img src="{{ $imgnb[0] }}" alt="" sizes="(max-width: 300px) 100vw, 300px">
            <a
                href="{{ route('detailProduct', ['cate' => $item->cate_slug, 'type' => $item->type_slug ? $item->type_slug : 'loai', 'id' => $item->slug]) }}">
                <span class="blog-one__plus"></span>
            </a>
        </div>
        <div class="blog-one__content">
            @if ($item->discount > 0 && $item->discount < $item->price && $item->price > 0)
                <div class="gia-sp">
                    <div class="price-sp">{{ number_format($item->discount, 0, ',', '.') }}₫</div>
                    <div class="price-sp-cu" style="text-decoration: line-through;">
                        {{ number_format($item->price, 0, ',', '.') }}₫</div>
                </div>
            @elseif($item->discount == 0 && $item->price > 0)
                <div class="price-sp blog-one__title">{{ number_format($item->price, 0, ',', '.') }}₫</div>
            @else
                <div class="price-sp blog-one__title">Liên hệ</div>
            @endif
            <h3 class="blog-one__title"><a
                    href="{{ route('detailProduct', ['cate' => $item->cate_slug, 'type' => $item->type_slug ? $item->type_slug : 'loai', 'id' => $item->slug]) }}">{{ $item->name }}</a>
            </h3>
        </div>
    </div>
