<section class="row">
    <h2 class="a-small components__title">Lazyload both images and srcset-images with <code>.lazyload</code> on target element. Uses jQuery-plugin: <code>../src/js/pluginsvendor/lazysizes.min.js</code></h2>
    <p><a href="http://afarkas.github.io/lazysizes/">See documentation</a></p>

    <img src="http://placehold.it/300x300"
         data-srcset="
				http://placehold.it/1800x750 1800w,
				http://placehold.it/1400x600 1400w,
				http://placehold.it/700x300 700w,
				http://placehold.it/500x200 500w"
         sizes="
     		(min-width: 1400px) 100vw, 
     		(min-width: 700px) 50vw,
     		100vw"
         alt="flexible image" class="lazyload row" />

</section>

<section class="fullbleed">
    <img src="http://placehold.it/100x75"
        data-src="http://placehold.it/1200x750"
        alt="100%x200" class="lazyload" />
</section>

<div class="row"></div>