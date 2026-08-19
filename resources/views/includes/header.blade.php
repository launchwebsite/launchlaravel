<!--=====================================
                    HEADER PART START
        =======================================-->
<header class="header-part" style="background-color:black;">
    <div class="container">
        <div class="header-content">
            <div class="header-left">
                <button type="button" class="header-widget sidebar-btn">
                    <i class="fas fa-align-left"></i>
                </button>
                <a class='header-logo' href='{{ route('home') }}'>
                    <img src="/storage/images/logo.png" alt="logo">
                </a>

                <!-- Join Me next to logo -->
                <a class='header-widget header-user header-join-me' href='{{ route('user') }}'>
                    <img src="/storage/images/user.png" alt="user">
                    <span>join me</span>
                </a>

                <button type="button" class="header-widget search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <form class="header-form">
                <div class="header-search">
                    <button type="submit" title="Search Submit "><i class="fas fa-search"></i></button>
                    <input type="text" placeholder="Search, Whatever you needs...">
                    <button type="button" title="Search Option" class="option-btn"><i
                            class="fas fa-sliders-h"></i></button>
                </div>
                <div class="header-option">
                    <div class="option-grid">
                        <div class="option-group"><input type="text" placeholder="City"></div>
                        <div class="option-group"><input type="text" placeholder="State"></div>
                        <div class="option-group"><input type="text" placeholder="Min Price"></div>
                        <div class="option-group"><input type="text" placeholder="Max Price"></div>
                        <button type="submit"><i class="fas fa-search"></i><span>Search</span></button>
                    </div>
                </div>
            </form>

            <div class="header-right">
                <!-- OLX-style Dubai Location Filter -->
                <div class="location-filter" id="locationFilter">
                    <button type="button" class="location-btn" id="locationBtn" title="Select Dubai Area">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="location-text" id="locationText">All Dubai</span>
                        <i class="fas fa-chevron-down location-arrow" id="locationArrow"></i>
                    </button>

                    <!-- Location Dropdown Panel -->
                    <div class="location-dropdown" id="locationDropdown">
                        <div class="location-dropdown-header">
                            <h6><i class="fas fa-map-marker-alt"></i> Dubai Areas</h6>
                            <button type="button" class="location-close-btn" id="locationCloseBtn">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <!-- Detect My Location -->
                        <button type="button" class="detect-location-btn" id="detectLocationBtn">
                            <i class="fas fa-crosshairs"></i>
                            <span>Detect my location</span>
                            <span class="detect-badge">GPS</span>
                        </button>

                        <div class="location-divider"><span>or browse by area</span></div>

                        <!-- Search Input -->
                        <div class="location-search-wrap">
                            <i class="fas fa-search"></i>
                            <input type="text" id="locationSearchInput" placeholder="Search area in Dubai..." autocomplete="off">
                            <button type="button" class="location-clear-input" id="clearLocationInput" style="display:none;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <!-- Dubai Areas List -->
                        <div class="location-results" id="locationResults">
                            <p class="location-label">Dubai Areas</p>
                            <ul class="location-city-list" id="locationCityList">
                                <li data-city="All Dubai"><i class="fas fa-city"></i> All Dubai</li>
                                <li data-city="Deira"><i class="fas fa-map-pin"></i> Deira</li>
                                <li data-city="Bur Dubai"><i class="fas fa-map-pin"></i> Bur Dubai</li>
                                <li data-city="Downtown Dubai"><i class="fas fa-map-pin"></i> Downtown Dubai</li>
                                <li data-city="Dubai Marina"><i class="fas fa-map-pin"></i> Dubai Marina</li>
                                <li data-city="Jumeirah"><i class="fas fa-map-pin"></i> Jumeirah</li>
                                <li data-city="JBR"><i class="fas fa-map-pin"></i> JBR</li>
                                <li data-city="Al Quoz"><i class="fas fa-map-pin"></i> Al Quoz</li>
                                <li data-city="Al Barsha"><i class="fas fa-map-pin"></i> Al Barsha</li>
                                <li data-city="Mirdif"><i class="fas fa-map-pin"></i> Mirdif</li>
                                <li data-city="Karama"><i class="fas fa-map-pin"></i> Karama</li>
                                <li data-city="Oud Metha"><i class="fas fa-map-pin"></i> Oud Metha</li>
                                <li data-city="Satwa"><i class="fas fa-map-pin"></i> Satwa</li>
                                <li data-city="Qusais"><i class="fas fa-map-pin"></i> Qusais</li>
                                <li data-city="Silicon Oasis"><i class="fas fa-map-pin"></i> Silicon Oasis</li>
                                <li data-city="Business Bay"><i class="fas fa-map-pin"></i> Business Bay</li>
                                <li data-city="DIFC"><i class="fas fa-map-pin"></i> DIFC</li>
                                <li data-city="Jumeirah Lake Towers"><i class="fas fa-map-pin"></i> Jumeirah Lake Towers</li>
                                <li data-city="Discovery Gardens"><i class="fas fa-map-pin"></i> Discovery Gardens</li>
                                <li data-city="International City"><i class="fas fa-map-pin"></i> International City</li>
                                <li data-city="Sports City"><i class="fas fa-map-pin"></i> Sports City</li>
                                <li data-city="Motor City"><i class="fas fa-map-pin"></i> Motor City</li>
                                <li data-city="Arabian Ranches"><i class="fas fa-map-pin"></i> Arabian Ranches</li>
                                <li data-city="Palm Jumeirah"><i class="fas fa-map-pin"></i> Palm Jumeirah</li>
                                <li data-city="Al Rigga"><i class="fas fa-map-pin"></i> Al Rigga</li>
                            </ul>
                        </div>

                        <!-- Detecting Spinner -->
                        <div class="location-detecting" id="locationDetecting" style="display:none;">
                            <div class="location-spinner"></div>
                            <span>Detecting your location...</span>
                        </div>
                    </div>
                </div>

                <a class='btn btn-inline post-btn' href='{{ route('adpost') }}'>
                    <i class="fas fa-plus-circle"></i>
                    <span>post your ad</span>
                </a>
            </div>
        </div>
    </div>
</header>
<!--=====================================
                    HEADER PART END
        =======================================-->

<script>
(function() {
    /* ─────────────────────────────────────────────
       DUBAI AREAS LIST
    ───────────────────────────────────────────── */
    let allAreas = [
        { name: 'All Dubai' },
        { name: 'Deira' },
        { name: 'Bur Dubai' },
        { name: 'Downtown Dubai' },
        { name: 'Dubai Marina' },
        { name: 'Jumeirah' },
        { name: 'JBR' },
        { name: 'Al Quoz' },
        { name: 'Al Barsha' },
        { name: 'Mirdif' },
        { name: 'Karama' },
        { name: 'Oud Metha' },
        { name: 'Satwa' },
        { name: 'Qusais' },
        { name: 'Silicon Oasis' },
        { name: 'Business Bay' },
        { name: 'DIFC' },
        { name: 'Jumeirah Lake Towers' },
        { name: 'Discovery Gardens' },
        { name: 'International City' },
        { name: 'Sports City' },
        { name: 'Motor City' },
        { name: 'Arabian Ranches' },
        { name: 'Palm Jumeirah' },
        { name: 'Al Rigga' },
    ];

    function updateDropdownLabels(cityName) {
        const label = document.querySelector('.location-label');
        const header = document.querySelector('.location-dropdown-header h6');
        if (label) label.textContent = 'Areas near ' + cityName;
        if (header) header.innerHTML = '<i class="fas fa-map-marker-alt"></i> ' + cityName + ' Areas';
    }

    try {
        const savedAreas = localStorage.getItem('dynamicAreas');
        if (savedAreas) {
            allAreas = JSON.parse(savedAreas);
        }
        const savedCity = localStorage.getItem('detectedCityName');
        if (savedCity) {
            updateDropdownLabels(savedCity);
        }
    } catch(e) {}

    /* ─────────────────────────────────────────────
       ELEMENT REFS
    ───────────────────────────────────────────── */
    const locationBtn         = document.getElementById('locationBtn');
    const locationDropdown    = document.getElementById('locationDropdown');
    const locationText        = document.getElementById('locationText');
    const locationArrow       = document.getElementById('locationArrow');
    const locationCloseBtn    = document.getElementById('locationCloseBtn');
    const detectLocationBtn   = document.getElementById('detectLocationBtn');
    const locationSearchInput = document.getElementById('locationSearchInput');
    const clearLocationInput  = document.getElementById('clearLocationInput');
    const locationCityList    = document.getElementById('locationCityList');
    const locationDetecting   = document.getElementById('locationDetecting');
    const locationResults     = document.getElementById('locationResults');

    // Modal elements
    const modal          = document.getElementById('locationPermModal');
    const btnAllow       = document.getElementById('locPermAllow');
    const btnSkip        = document.getElementById('locPermSkip');
    const detectingToast = document.getElementById('locDetectingToast');
    const successToast   = document.getElementById('locSuccessToast');
    const successMsg     = document.getElementById('locSuccessMsg');

    /* ─────────────────────────────────────────────
       CLIENT-SIDE CARD FILTER
    ───────────────────────────────────────────── */
    function filterCardsByArea(area) {
        document.querySelectorAll('.product-card').forEach(function(card) {
            let wrapper = card;
            const col = card.closest('[class*="col-"]');
            
            // Only use the column wrapper if it strictly wraps this single card (prevents hiding whole sliders)
            if (col && col.querySelectorAll('.product-card').length === 1) {
                wrapper = col;
            } else {
                const slickSlide = card.closest('.slick-slide');
                if (slickSlide) wrapper = slickSlide;
            }

            if (area === 'All Dubai' || area.startsWith('All ')) {
                wrapper.classList.remove('loc-filtered-hidden');
                card.classList.remove('loc-filtered-hidden');
                if (col) col.classList.remove('loc-filtered-hidden'); // Cleanup any old state
                return;
            }

            const metaSpans = card.querySelectorAll('.product-meta span');
            let cardLocation = '';
            metaSpans.forEach(function(sp) {
                if (sp.querySelector('.fa-map-marker-alt')) {
                    cardLocation = sp.textContent.toLowerCase();
                }
            });
            
            const matches = cardLocation.includes(area.toLowerCase());
            wrapper.classList.toggle('loc-filtered-hidden', !matches);
        });

        // Refresh slick carousel to prevent the "collapsed line" UI bug when slides are hidden
        if (window.jQuery) {
            setTimeout(function() {
                try { jQuery('.slider-arrow').slick('setPosition'); } catch(e){}
            }, 100);
        }
    }

    /* ─────────────────────────────────────────────
       SELECT AREA — updates button + filters page
    ───────────────────────────────────────────── */
    function selectArea(area) {
        locationText.textContent = area;
        localStorage.setItem('selectedDubaiArea', area);
        locationDropdown.classList.remove('open');
        locationArrow.classList.remove('rotated');
        if (locationSearchInput) { locationSearchInput.value = ''; }
        if (clearLocationInput) clearLocationInput.style.display = 'none';
        renderAreas(allAreas);
        filterCardsByArea(area);
    }

    /* ─────────────────────────────────────────────
       GPS DETECT CORE LOGIC (shared by modal + in-dropdown button)
    ───────────────────────────────────────────── */
    function detectGPS(onStart, onEnd) {
        if (!navigator.geolocation) {
            alert('Geolocation is not supported by your browser.');
            return;
        }
        if (onStart) onStart();

        navigator.geolocation.getCurrentPosition(
            function(position) {
                fetch('https://nominatim.openstreetmap.org/reverse?format=json&lat='
                    + position.coords.latitude + '&lon=' + position.coords.longitude)
                    .then(function(res) { return res.json(); })
                    .then(function(data) {
                        const locationName = data.address.city
                            || data.address.town
                            || data.address.village
                            || data.address.suburb
                            || data.address.state
                            || 'Unknown Location';

                        const match = allAreas.find(function(a) {
                            return a.name !== 'All Dubai' &&
                                   locationName.toLowerCase().includes(a.name.toLowerCase());
                        });
                        const detected = match ? match.name : locationName;

                        if (match) {
                            if (onEnd) onEnd(detected);
                            selectArea(detected);
                            return;
                        }

                        // Try to find nearby famous areas for dynamic population
                        const query = '[out:json];node(around:25000,' + position.coords.latitude + ',' + position.coords.longitude + ')["place"~"suburb|town"];out 15;';
                        const controller = new AbortController();
                        const timeoutId = setTimeout(function() { controller.abort(); }, 3500);

                        fetch('https://overpass-api.de/api/interpreter?data=' + encodeURIComponent(query), { signal: controller.signal })
                            .then(function(res) { return res.json(); })
                            .then(function(opData) {
                                clearTimeout(timeoutId);
                                let newAreas = [{ name: 'All ' + locationName }];
                                if (opData && opData.elements) {
                                    opData.elements.forEach(function(el) {
                                        if (el.tags && el.tags.name) {
                                            if (!newAreas.find(function(a) { return a.name === el.tags.name; })) {
                                                newAreas.push({ name: el.tags.name });
                                            }
                                        }
                                    });
                                }
                                if (newAreas.length > 1) {
                                    allAreas = newAreas;
                                    try {
                                        localStorage.setItem('dynamicAreas', JSON.stringify(allAreas));
                                        localStorage.setItem('detectedCityName', locationName);
                                    } catch(e) {}
                                    updateDropdownLabels(locationName);
                                }
                                if (onEnd) onEnd(detected);
                                selectArea(detected);
                            })
                            .catch(function() {
                                if (onEnd) onEnd(detected);
                                selectArea(detected);
                            });
                    })
                    .catch(function() {
                        if (onEnd) onEnd(null);
                        selectArea('All Dubai');
                    });
            },
            function() {
                if (onEnd) onEnd(null);
                selectArea('All Dubai');
            },
            { enableHighAccuracy: false, maximumAge: 60000, timeout: 5000 }
        );
    }

    /* ─────────────────────────────────────────────
       FIRST-VISIT LOCATION MODAL
    ───────────────────────────────────────────── */
    function closeModal() {
        if (modal) modal.style.display = 'none';
    }

    function showSuccessToast(area) {
        if (!successToast) return;
        successMsg.textContent = 'Showing results near ' + area;
        successToast.style.display = 'flex';
        setTimeout(function() { successToast.style.display = 'none'; }, 3500);
    }

    // Show modal only if location not yet decided (per session)
    if (window.location.search.includes('reset_loc')) {
        sessionStorage.removeItem('locationDecided');
        localStorage.removeItem('selectedDubaiArea');
    }
    
    if (modal && !sessionStorage.getItem('locationDecided')) {
        // Small delay so page renders first
        setTimeout(function() { modal.style.display = ''; }, 600);
    }

    // ALLOW button
    if (btnAllow) {
        btnAllow.addEventListener('click', function() {
            sessionStorage.setItem('locationDecided', '1');
            closeModal();
            detectGPS(
                function() {
                    // onStart — show detecting toast
                    if (detectingToast) detectingToast.style.display = 'flex';
                },
                function(detected) {
                    // onEnd — hide detecting toast, show success
                    if (detectingToast) detectingToast.style.display = 'none';
                    if (detected) showSuccessToast(detected);
                }
            );
        });
    }

    // SKIP button
    if (btnSkip) {
        btnSkip.addEventListener('click', function() {
            sessionStorage.setItem('locationDecided', '1');
            closeModal();
        });
    }

    /* ─────────────────────────────────────────────
       RESTORE SAVED AREA ON PAGE LOAD
    ───────────────────────────────────────────── */
    const savedArea = localStorage.getItem('selectedDubaiArea');
    if (savedArea) {
        if (locationText) locationText.textContent = savedArea;
        // Filter cards after DOM is ready
        if (document.readyState === 'complete') {
            filterCardsByArea(savedArea);
        } else {
            window.addEventListener('load', function() { filterCardsByArea(savedArea); });
        }
    }
    
    // Render areas to overwrite static HTML if we loaded dynamic ones
    renderAreas(allAreas);

    /* ─────────────────────────────────────────────
       HEADER DROPDOWN TOGGLE
    ───────────────────────────────────────────── */
    if (locationBtn) {
        locationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const isOpen = locationDropdown.classList.contains('open');
            locationDropdown.classList.toggle('open', !isOpen);
            locationArrow.classList.toggle('rotated', !isOpen);
            if (!isOpen && locationSearchInput) {
                setTimeout(function() { locationSearchInput.focus(); }, 150);
            }
        });
    }

    document.addEventListener('click', function(e) {
        const filter = document.getElementById('locationFilter');
        if (filter && !filter.contains(e.target)) {
            if (locationDropdown) locationDropdown.classList.remove('open');
            if (locationArrow)   locationArrow.classList.remove('rotated');
        }
    });

    if (locationCloseBtn) {
        locationCloseBtn.addEventListener('click', function() {
            locationDropdown.classList.remove('open');
            locationArrow.classList.remove('rotated');
        });
    }

    /* ─────────────────────────────────────────────
       DROPDOWN AREA SELECTION
    ───────────────────────────────────────────── */
    if (locationCityList) {
        locationCityList.addEventListener('click', function(e) {
            const li = e.target.closest('li');
            if (!li || li.classList.contains('no-results')) return;
            selectArea(li.getAttribute('data-city'));
        });
    }

    /* ─────────────────────────────────────────────
       LIVE SEARCH FILTER
    ───────────────────────────────────────────── */
    if (locationSearchInput) {
        locationSearchInput.addEventListener('input', function() {
            const q = this.value.trim().toLowerCase();
            if (clearLocationInput) clearLocationInput.style.display = q.length > 0 ? 'flex' : 'none';
            renderAreas(q.length === 0 ? allAreas : allAreas.filter(function(a) {
                return a.name.toLowerCase().includes(q);
            }), q);
        });
    }

    if (clearLocationInput) {
        clearLocationInput.addEventListener('click', function() {
            locationSearchInput.value = '';
            clearLocationInput.style.display = 'none';
            renderAreas(allAreas);
            locationSearchInput.focus();
        });
    }

    function renderAreas(areas, query) {
        if (!locationCityList) return;
        locationCityList.innerHTML = '';
        if (areas.length === 0) {
            locationCityList.innerHTML = '<li class="no-results"><i class="fas fa-search"></i> No areas found</li>';
            return;
        }
        areas.forEach(function(a) {
            const li = document.createElement('li');
            li.setAttribute('data-city', a.name);
            const icon = a.name === 'All Dubai' ? 'fas fa-city' : 'fas fa-map-pin';
            let displayName = a.name;
            if (query) {
                const regex = new RegExp('(' + query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ')', 'gi');
                displayName = a.name.replace(regex, '<mark>$1</mark>');
            }
            li.innerHTML = '<i class="' + icon + '"></i> ' + displayName;
            locationCityList.appendChild(li);
        });
    }

    /* ─────────────────────────────────────────────
       IN-DROPDOWN GPS DETECT BUTTON
    ───────────────────────────────────────────── */
    if (detectLocationBtn) {
        detectLocationBtn.addEventListener('click', function() {
            if (locationDetecting) locationDetecting.style.display = 'flex';
            if (locationResults)   locationResults.style.display = 'none';
            detectLocationBtn.disabled = true;

            detectGPS(null, function(detected) {
                if (locationDetecting) locationDetecting.style.display = 'none';
                if (locationResults)   locationResults.style.display = 'block';
                detectLocationBtn.disabled = false;
            });
        });
    }

})();
</script>

