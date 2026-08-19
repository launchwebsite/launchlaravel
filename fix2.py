import re

path = 'resources/views/home.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

card_template = """
                @foreach ($products as $item)
                    @php
                        $d = $item->PR_Details;

                        if (in_array($item->SC_Id, [7, 17, 18, 19])) {
                            // furniture
                            $title =
                                $d['Bed Type'] ??
                                ($d['Sofa Type'] ??
                                    ($d['Table Type'] ?? ($d['Wardrobe Type'] ?? 'Ad #' . $item->PR_Id)));
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [20, 21, 22, 23])) {
                            // property
                            $title = $d['Property Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Property Type'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [24, 25, 26, 27])) {
                            // electronics
                            $title = trim(($d['Brand'] ?? '') . ' ' . ($d['Model'] ?? '')) ?: 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [28, 29, 30, 31])) {
                            // vehicles
                            $title = $d['Vehicle Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Body Type'] ?? ($d['Condition'] ?? 'N/A');
                        } else {
                            $title = 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        }

                        $image = $d['Main Image'] ?? null;
                    @endphp

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    @if ($image)
                                        <img src="/storage/uploads/products/{{ $image }}" alt="product">
                                    @else
                                        <img src="/storage/images/product/01.jpg" alt="product">
                                    @endif
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge booking">{{ $badge }}</span>
                                </div>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('addetails', \\Vinkla\\Hashids\\Facades\\Hashids::encode($item->PR_Id)) }}">{{ $badge }}</a>
                                    </li>
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails', \\Vinkla\\Hashids\\Facades\\Hashids::encode($item->PR_Id)) }}">{{ $title }}</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>{{ $d['Location'] ?? 'N/A' }}</span>
                                    <span><i class="fas fa-clock"></i>{{ $item->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">{{ $d['Price'] ?? 'N/A' }}</h5>
                                    <div class="product-btn">
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
"""

c1 = content
# We strictly match everything until the specific HTML comment that ends each tab
c1, c = re.subn(r'(<div class="tab-pane[^"]*" id="ratings">\s*<div class="row">).*?(</div> <!-- Rating ads -->)', lambda m: m.group(1) + card_template + "\n                </div>\n            " + m.group(2), c1, flags=re.DOTALL)
print("ratings:", c)

c1, c = re.subn(r'(<div class="tab-pane[^"]*" id="advertiser">\s*<div class="row">).*?(</div> <!-- Advertiser ads -->)', lambda m: m.group(1) + card_template + "\n                </div>\n            " + m.group(2), c1, flags=re.DOTALL)
print("advertiser:", c)

c1, c = re.subn(r'(<div class="tab-pane[^"]*" id="engaged">\s*<div class="row">).*?(</div> <!-- Engaged ads -->)', lambda m: m.group(1) + card_template + "\n                </div>\n            " + m.group(2), c1, flags=re.DOTALL)
print("engaged:", c)

with open(path, 'w', encoding='utf-8') as f:
    f.write(c1)
print("Done writing.")
