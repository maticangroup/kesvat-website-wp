if ($('#gmap_2').length > 0) {

    $(document).ready(function () {
        var map = $.sMap({
            element: '#gmap_2',
            presets: {
                latlng: {
                    lat: $('#gmap_2').data('lat'),
                    lng: $('#gmap_2').data('lng'),
                },
                zoom: 12,
            },
        });

        $.sMap.layers.static.build();

        var marker = $.sMap.features.marker.create({
            name: 'demo-marker',
            popup: {
                title: {
                    html: 'آراد موبایل اینجاست',
                    i18n: '',
                },
                description: {
                    html: 'توضیحات و آدرس آراد موبایل رو اینجا مینویسیم',
                    i18n: '',
                },
                custom: false,
            },
            latlng: {
                lat: $('#gmap_2').data('lat'),
                lng: $('#gmap_2').data('lng')
            },
            icon: icons.default.blue,
            popupOpen: true,
            pan: true,
            on: {
                click: function () {
                    console.log('Click callback.');
                },
                contextmenu: function () {
                    console.log('Contextmenu callback.');
                },
            },
            toolbar: [],
        });
    });
}