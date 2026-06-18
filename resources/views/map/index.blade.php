@extends('layouts.app')

@push('styles')
{{-- MapLibre GL CSS via CDN --}}
<link href="https://unpkg.com/maplibre-gl@4/dist/maplibre-gl.css" rel="stylesheet">
<style>
    #map { position: absolute; top: 0; bottom: 0; left: 0; right: 0; }
    .custom-popup .maplibregl-popup-content {
        background-color: #0f172a !important;
        color: #f1f5f9 !important;
        border: 1px solid #1e293b !important;
        border-radius: 12px !important;
        padding: 12px 14px !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.4) !important;
    }
    .custom-popup .maplibregl-popup-anchor-top .maplibregl-popup-tip { border-bottom-color: #1e293b !important; }
    .custom-popup .maplibregl-popup-anchor-bottom .maplibregl-popup-tip { border-top-color: #1e293b !important; }
    .custom-popup .maplibregl-popup-anchor-left .maplibregl-popup-tip { border-right-color: #1e293b !important; }
    .custom-popup .maplibregl-popup-anchor-right .maplibregl-popup-tip { border-left-color: #1e293b !important; }
    .custom-popup .maplibregl-popup-close-button {
        color: #94a3b8 !important;
        font-size: 18px !important;
        padding: 4px 8px !important;
    }
    .custom-popup .maplibregl-popup-close-button:hover {
        color: #f1f5f9 !important;
        background: transparent !important;
    }
    .custom-marker {
        cursor: pointer;
        filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.3));
        transition: transform 0.2s ease;
    }
    .custom-marker:hover {
        transform: scale(1.15);
    }

    /* Mobile sidebar overlay */
    .mobile-sidebar-overlay {
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }
    .mobile-sidebar-panel {
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
</style>
@endpush

@section('content')
<div class="relative h-[calc(100vh-64px)] overflow-hidden bg-slate-950 md:flex"
     x-data="{ sidebarOpen: false }">

    {{-- MOBILE: Floating toggle button --}}
    <button @click="sidebarOpen = !sidebarOpen"
            class="md:hidden fixed bottom-6 left-6 z-30 w-12 h-12 bg-slate-900/90 backdrop-blur-md border border-slate-800 rounded-xl flex items-center justify-center text-white shadow-xl shadow-black/30 hover:bg-slate-800 transition-all"
            :class="{ 'bg-blue-600 border-blue-500': sidebarOpen }">
        <svg x-show="!sidebarOpen" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        </svg>
        <svg x-show="sidebarOpen" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    {{-- MOBILE: Overlay backdrop --}}
    <div x-show="sidebarOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="md:hidden fixed inset-0 z-20 bg-black/50 backdrop-blur-sm mobile-sidebar-overlay">
    </div>

    {{-- DESKTOP: Sidebar always visible | MOBILE: Slide-in panel --}}
    <aside class="fixed md:relative z-20 md:z-10 h-full w-72 md:w-80
                  bg-slate-950/95 md:bg-slate-950/80 backdrop-blur-md border-r border-slate-900
                  p-5 md:p-6 overflow-y-auto flex-shrink-0 flex flex-col justify-between
                  transform transition-transform duration-300 ease-out
                  md:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">

        <div>
            <div class="mb-5">
                <h1 class="text-lg md:text-xl font-extrabold text-white tracking-tight flex items-center gap-2">
                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-blue-500 animate-pulse"></span>
                    Live GIS Explorer
                </h1>
                <p class="text-xs text-slate-500 font-mono mt-1">Studi Kasus Integrasi Spasial — MAPID</p>
            </div>

            {{-- Layer Controller --}}
            <div class="space-y-5" x-data="{ showMarker: true, showLine: true, showPolygon: true, radius: 2.0 }">

                <div>
                    <h2 class="text-[11px] font-bold text-slate-500 uppercase tracking-widest font-mono mb-3">Layer Spasial</h2>
                    <div class="space-y-2">

                        {{-- Toggle Titik/Marker --}}
                        <label class="flex items-center justify-between p-2.5 rounded-xl bg-slate-900/50 border border-slate-850 hover:border-slate-800 transition-all cursor-pointer">
                            <span class="flex items-center gap-3">
                                <span class="w-3.5 h-3.5 rounded-full bg-blue-500 flex-shrink-0 shadow-lg shadow-blue-500/20"></span>
                                <span class="text-sm font-medium text-slate-300">Marker Lokasi</span>
                            </span>
                            <input type="checkbox" id="toggle-markers" checked
                                   @change="showMarker = !showMarker; toggleMarkerVisibility(showMarker)"
                                   class="rounded bg-slate-950 border-slate-800 text-blue-600 focus:ring-blue-500/20 w-4 h-4">
                        </label>

                        {{-- Toggle Jalur/LineString --}}
                        <label class="flex items-center justify-between p-2.5 rounded-xl bg-slate-900/50 border border-slate-850 hover:border-slate-800 transition-all cursor-pointer">
                            <span class="flex items-center gap-3">
                                <span class="w-3.5 h-1 bg-emerald-500 rounded flex-shrink-0"></span>
                                <span class="text-sm font-medium text-slate-300">Jalur Perjalanan</span>
                            </span>
                            <input type="checkbox" id="toggle-line" checked
                                   @change="showLine = !showLine; toggleLayerVisibility('route-line', showLine)"
                                   class="rounded bg-slate-950 border-slate-800 text-emerald-600 focus:ring-emerald-500/20 w-4 h-4">
                        </label>

                        {{-- Toggle Area/Polygon (Circle Zone) --}}
                        <div class="p-2.5 rounded-xl bg-slate-900/50 border border-slate-850 hover:border-slate-800 transition-all">
                            <div class="flex items-center justify-between cursor-pointer">
                                <span class="flex items-center gap-3">
                                    <span class="w-3.5 h-3.5 bg-orange-500/20 border border-orange-500 rounded-full flex-shrink-0"></span>
                                    <span class="text-sm font-medium text-slate-300">Zonasi Area</span>
                                </span>
                                <input type="checkbox" id="toggle-polygon" checked
                                       @change="showPolygon = !showPolygon; toggleLayerVisibility('zone-fill', showPolygon); toggleLayerVisibility('zone-outline', showPolygon)"
                                       class="rounded bg-slate-950 border-slate-800 text-orange-600 focus:ring-orange-500/20 w-4 h-4">
                            </div>
                            
                            {{-- Slider Radius --}}
                            <div class="mt-3 pt-3 border-t border-slate-800/60" x-show="showPolygon" x-transition>
                                <div class="flex justify-between items-center text-[10px] text-slate-500 font-mono mb-1.5">
                                    <span>RADIUS JANGKAUAN:</span>
                                    <span class="text-orange-400 font-bold" x-text="radius.toFixed(1) + ' KM'"></span>
                                </div>
                                <input type="range" min="0.5" max="5.0" step="0.1" x-model.number="radius"
                                       @input="updateZoneRadius(radius)"
                                       class="w-full h-1 bg-slate-950 border-0 rounded-lg appearance-none cursor-pointer accent-orange-500">
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Legend --}}
                <div>
                    <h2 class="text-[11px] font-bold text-slate-500 uppercase tracking-widest font-mono mb-3">Legenda</h2>
                    <div class="space-y-2 text-xs text-slate-400 font-mono">
                        <div class="flex items-center gap-2">
                            <span>🔵</span> <strong>Marker:</strong> 5 Titik Utama di Bandung
                        </div>
                        <div class="flex items-center gap-2">
                            <span>🟢</span> <strong>LineString:</strong> Rute Jalan Snapped
                        </div>
                        <div class="flex items-center gap-2">
                            <span>🟠</span> <strong>Lingkaran:</strong> Radius Area Cakupan
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- GIS Info Card --}}
        <div class="p-4 bg-slate-900/60 border border-slate-850 rounded-xl space-y-2 mt-5">
            <h3 class="text-xs font-bold text-white uppercase font-mono tracking-wider">Engine Informasi</h3>
            <p class="text-[11px] text-slate-400 leading-relaxed">Peta ini menggunakan teknologi <strong>WebGL Renderer</strong> berdaya performa tinggi via MapLibre GL JS untuk manipulasi koordinat spasial secara realtime.</p>
        </div>

    </aside>

    {{-- Map Container — Full viewport on mobile --}}
    <div class="absolute inset-0 md:relative md:flex-1 md:h-full">
        <div id="map" class="w-full h-full"></div>
    </div>

</div>
@endsection

@push('scripts')
{{-- MapLibre JS Engine via CDN --}}
<script src="https://unpkg.com/maplibre-gl@4/dist/maplibre-gl.js"></script>

<script>
const METROPOLITAN_DATA = @json($mapData);
let markerElements = [];

const map = new maplibregl.Map({
    container: 'map',
    style: 'https://basemaps.cartocdn.com/gl/voyager-gl-style/style.json',
    center: METROPOLITAN_DATA.center,
    zoom: METROPOLITAN_DATA.zoom,
    attributionControl: false
});

map.addControl(new maplibregl.NavigationControl({ showCompass: true }), 'top-right');
map.addControl(new maplibregl.ScaleControl({ unit: 'metric' }), 'bottom-left');

// Circle Zone Generator Function (GIS Best Practice for geographic radius)
function createGeoJSONCircle(center, radiusInKm, points = 64) {
    const coords = { latitude: center[1], longitude: center[0] };
    const distanceX = radiusInKm / (111.32 * Math.cos((coords.latitude * Math.PI) / 180));
    const distanceY = radiusInKm / 110.574;
    const ret = [];
    for (let i = 0; i < points; i++) {
        const theta = (i / points) * (2 * Math.PI);
        const x = distanceX * Math.cos(theta);
        const y = distanceY * Math.sin(theta);
        ret.push([coords.longitude + x, coords.latitude + y]);
    }
    ret.push(ret[0]); // Close the polygon
    return {
        type: 'Feature',
        geometry: { type: 'Polygon', coordinates: [ret] }
    };
}

map.on('load', () => {

    // LineString
    map.addSource('simulated-route', {
        type: 'geojson',
        data: {
            type: 'Feature',
            geometry: { type: 'LineString', coordinates: METROPOLITAN_DATA.lineString }
        }
    });

    map.addLayer({
        id: 'route-line',
        type: 'line',
        source: 'simulated-route',
        layout: { 'line-join': 'round', 'line-cap': 'round' },
        paint: { 'line-color': '#10b981', 'line-width': 4.5, 'line-opacity': 0.85 }
    });

    // Fetch real road routing from OSRM API (GIS Best Practice)
    const routeCoords = METROPOLITAN_DATA.lineString.map(coord => `${coord[0]},${coord[1]}`).join(';');
    fetch(`https://router.project-osrm.org/route/v1/driving/${routeCoords}?overview=full&geometries=geojson`)
        .then(response => response.json())
        .then(data => {
            if (data.code === 'Ok' && data.routes && data.routes.length > 0) {
                map.getSource('simulated-route').setData({
                    type: 'Feature',
                    properties: {},
                    geometry: data.routes[0].geometry
                });

                // Snap markers to the actual road waypoints returned by OSRM
                if (data.waypoints && data.waypoints.length === METROPOLITAN_DATA.lineString.length) {
                    data.waypoints.forEach((wp, idx) => {
                        const originalCoord = METROPOLITAN_DATA.lineString[idx];
                        const marker = markerElements.find(m => {
                            const lngLat = m.getLngLat();
                            return Math.abs(lngLat.lng - originalCoord[0]) < 0.0015 && 
                                   Math.abs(lngLat.lat - originalCoord[1]) < 0.0015;
                        });
                        if (marker) {
                            marker.setLngLat(wp.location);
                        }
                    });
                }
            }
        })
        .catch(error => {
            console.warn('OSRM routing failed, falling back to straight lines:', error);
        });

    // Polygon (Circle Zone around KM 0)
    map.addSource('simulated-zone', {
        type: 'geojson',
        data: createGeoJSONCircle(METROPOLITAN_DATA.center, 2.0)
    });

    map.addLayer({
        id: 'zone-fill',
        type: 'fill',
        source: 'simulated-zone',
        paint: { 'fill-color': '#f97316', 'fill-opacity': 0.15 }
    });

    map.addLayer({
        id: 'zone-outline',
        type: 'line',
        source: 'simulated-zone',
        paint: { 'line-color': '#f97316', 'line-width': 2, 'line-opacity': 0.75 }
    });

    // Markers
    METROPOLITAN_DATA.markers.forEach((item) => {
        const markerEl = document.createElement('div');
        markerEl.className = 'custom-marker';
        markerEl.innerHTML = `
            <svg viewBox="0 0 24 24" fill="currentColor" style="color: #3b82f6; width: 32px; height: 32px;">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
            </svg>
        `;

        const popup = new maplibregl.Popup({ offset: 15, className: 'custom-popup' })
            .setHTML(`
                <div style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <span style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #60a5fa; font-family: 'JetBrains Mono', monospace;">${item.category}</span>
                    <h4 style="font-size: 14px; font-weight: 800; color: white; margin: 4px 0;">${item.title}</h4>
                    <p style="font-size: 12px; color: #94a3b8; line-height: 1.6; margin: 0;">${item.desc}</p>
                    <div style="padding-top: 8px; margin-top: 8px; font-size: 10px; color: #64748b; font-family: 'JetBrains Mono', monospace; border-top: 1px solid #1e293b;">
                        LAT: ${item.lat.toFixed(5)} | LNG: ${item.lng.toFixed(5)}
                    </div>
                </div>
            `);

        const markerInstance = new maplibregl.Marker({ element: markerEl })
            .setLngLat([item.lng, item.lat])
            .setPopup(popup)
            .addTo(map);

        markerElements.push(markerInstance);
    });

});

window.updateZoneRadius = function(radius) {
    if (map.getSource('simulated-zone')) {
        map.getSource('simulated-zone').setData(createGeoJSONCircle(METROPOLITAN_DATA.center, radius));
    }
};

function toggleLayerVisibility(layerId, isVisible) {
    if (map.getLayer(layerId)) {
        map.setLayoutProperty(layerId, 'visibility', isVisible ? 'visible' : 'none');
    }
}

function toggleMarkerVisibility(isVisible) {
    markerElements.forEach(marker => {
        const el = marker.getElement();
        if (el) el.style.display = isVisible ? 'block' : 'none';
    });
}

// Ensure map resizes correctly when sidebar toggles
setTimeout(() => map.resize(), 100);
</script>
@endpush
