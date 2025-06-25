 <div class="sidebar side-detail" id="sidebar">
     <div class="sidebar__inner">
         <div class="product__sidebar">
             <div class="product__sidebar-title">
                 <h3 class="tieude-tuan">Danh mục sản phẩm</h3>
             </div>
         </div>
         <ul class="menu-2cap list-unstyled">
             @foreach ($categoryhome as $parent)
                 <li>
                     <a href="{{ route('allListProCate', ['danhmuc' => $parent->slug]) }}"
                         class="{{ request()->routeIs('allListProCate') && request('danhmuc') == $parent->slug ? 'active' : '' }}">{!! languageName($parent->name) !!}</a>
                     @if (isset($parent->typeCate) && count($parent->typeCate) > 0)
                         <ul class="submenu list-unstyled">
                             @foreach ($parent->typeCate as $child)
                                 <li class="boder-li">
                                     <a href="{{ route('allListType', ['danhmuc' => $parent->slug, 'loaidanhmuc' => $child->slug]) }}"
                                         class="{{ request()->routeIs('allListType') && request('loaidanhmuc') == $child->slug ? 'active' : '' }}">{!! languageName($child->name) !!}</a>
                                 </li>
                             @endforeach
                         </ul>
                     @endif
                 </li>
             @endforeach
         </ul>
     </div>
     <br>
     <br>
     <div class="sidebar-widget">
         <h4>Có thể bạn thích</h4>
         <ul class="list-unstyled">
             @foreach ($productlq as $item)
                 @php $imgItem = json_decode($item->images); @endphp
                 <li class="d-flex align-items-center mb-3">
                     <a href="{{ route('detailProduct', ['cate' => $item['cate_slug'], 'type' => $item['type_slug'] ? $item['type_slug'] : 'loai', 'id' => $item['slug']]) }}"
                         class="d-flex align-items-center text-decoration-none">
                         <img src="{{ $imgItem[0] ?? '' }}" alt="{{ $item->name }}" width="80" height="100"
                             style="object-fit:cover; border-radius:6px; margin-right:10px;">
                         <div>
                             <div style="font-weight:600; font-size:0.8rem !important;">{{ $item->name }}
                             </div>
                             <div>
                                 @if ($item->discount && $item->discount > 0 && $item->discount < $item->price)
                                     <span
                                         style="color:#888;text-decoration:line-through;margin-right:8px; font-size:11px !important;">
                                         {{ number_format($item->price, 0, ',', '.') }}đ
                                     </span>
                                     <span style="color:#e74c3c; font-size:11px !important;">
                                         {{ number_format($item->discount, 0, ',', '.') }}đ
                                     </span>
                                 @else
                                     <span style="color:#e74c3c; font-size:11px !important;">
                                         {{ number_format($item->price, 0, ',', '.') }}đ
                                     </span>
                                 @endif
                             </div>
                         </div>
                     </a>
                 </li>
             @endforeach
         </ul>
     </div>
 </div>
