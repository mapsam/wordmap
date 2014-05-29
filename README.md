wordmap
=======

These files are the bare-bones requirement for creating and reference a **custom post type for point geometry** using the [Mapbox/Leaflet](https://www.mapbox.com/mapbox.js/api/v1.6.3/) mapping library. The `functions.php` file includes the necessary scripts to build the custom post type and add the spatial meta boxes, which will show up in your `wp-admin` section.

The **post-to-point** process is as follows:

1. The `template-points.php` file uses a standard `WP_Query` loop for the custom post type `point`
1. That loop encodes PHP variables into javascript arrays
1. Those arrays are parsed into a GeoJSON object within `site.js`
1. The GeoJSON, with whatever post data you send with it is passed into the mapping library, which renders your points in the `#map` element.

The page template and the `site.js` file include the necessary scripts for this process. **Remember** to include the necessary mapping scripts in your template as well as your Mapbox tile ID, which is added in the `site.js` file.

```HTML
<script src='https://api.tiles.mapbox.com/mapbox.js/v1.6.3/mapbox.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox.js/v1.6.3/mapbox.css' rel='stylesheet' />
```

*These can be placed wherever you have your scripts running in your WordPress install, as long as your `site.js` loads after since it requires the scripts for access to specific functions.*

## Example

[View Wordmap in action!](http://mapsam.com/wordmap)

## Setup Instructions

Coming soon!

## Roadmap

Not sure, but shoot me some [issues](https://github.com/svmatthews/wordmap/issues)!