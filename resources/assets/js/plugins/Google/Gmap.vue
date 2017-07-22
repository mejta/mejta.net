<template>
    <div>
        <slot></slot>
    </div>
</template>
<script>
export default {
    props: ['zoom', 'lat', 'lng'],
    data () {
        return {
            center: {
                lat: this.lat ? this.lat : 0,
                lng: this.lng ? this.lng : 0,
            },
            positions: [],
            markers: [],
            options: {
                scrollwheel: false,
            },
            gmap: null,
            gmarkers: [],
        }
    },
    created () {
        this.$on('markerCreated', this.handleMarkerCreated);
    },
    mounted () {
        this.centerMap();
        this.createMap();
        this.markers.forEach(marker => this.createMarker(marker));
    },
    methods: {
        centerMap () {
            if(this.markers.length === 0) return;

            this.center = {
                lat: this.positions
                    .map((marker, i, a) => marker.lat / a.length)
                    .reduce((p, c) => p + c),
                lng: this.positions
                    .map((marker, i, a) => marker.lng / a.length)
                    .reduce((p, c) => p + c),
            };
        },
        createMap () {
            this.gmap = new google.maps.Map(this.$el, {
                center: this.center,
                scrollwheel: false,
                zoom: this.zoom ? this.zoom : 10,
            });
        },
        createMarker (marker) {
            marker.gmarker = new google.maps.Marker({
                position: marker.position,
                map: this.gmap,
            });
            this.createInfo(marker);
        },
        createInfo (marker) {
            if(!marker.info) return false;

            marker.ginfo = new google.maps.InfoWindow({
                content: marker.info,
            });

            marker.gmarker.addListener("click", event => {
                this.handleClickMarker(marker);
            });

            if(marker.opened) {
                this.handleClickMarker(marker);
            }
        },
        handleMarkerCreated (marker) {
            const {
                position,
                opened,
                info
            } = marker;
            this.positions.push(position);
            this.markers.push(marker);
        },
        handleClickMarker (marker) {
            this.markers.forEach(marker => {
                if(!marker.ginfo) return;
                marker.ginfo.close();
            });
            marker.ginfo.open(this.gmap, marker.gmarker);
        },
    },
};
</script>